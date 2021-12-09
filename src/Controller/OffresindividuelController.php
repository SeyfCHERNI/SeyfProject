<?php

namespace App\Controller;

use App\Entity\Offresindividuel;
use App\Form\OffresindividuelType;
use App\Repository\OffresindividuelRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface; // Nous appelons le bundle KNP Paginator

/**
 * @Route("/offresindividuel")
 */
class OffresindividuelController extends AbstractController
{
    /**
     * @Route("/", name="offresindividuel_index", methods={"GET"})
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
        // Nous ajoutons les paramètres requis
    
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri//

        $donnees = $this->getDoctrine()->getRepository(offresindividuel::class)->findAll();

        $offresindividuelRepository = $paginator->paginate(
            $donnees, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            2 // Nombre de résultats par page
        );
        return $this->render('offresindividuel/index.html.twig', [
            'offresindividuels' => $offresindividuelRepository,
        ]);
    }

    /**
     * @Route("/new", name="offresindividuel_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $offresindividuel = new Offresindividuel();
        $form = $this->createForm(OffresindividuelType::class, $offresindividuel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($offresindividuel);
            $entityManager->flush();

            return $this->redirectToRoute('offresindividuel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('offresindividuel/new.html.twig', [
            'offresindividuel' => $offresindividuel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="offresindividuel_show", methods={"GET"})
     */
    public function show(Offresindividuel $offresindividuel): Response
    {
        return $this->render('offresindividuel/show.html.twig', [
            'offresindividuel' => $offresindividuel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="offresindividuel_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Offresindividuel $offresindividuel, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OffresindividuelType::class, $offresindividuel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('offresindividuel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('offresindividuel/edit.html.twig', [
            'offresindividuel' => $offresindividuel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="offresindividuel_delete", methods={"POST"})
     */
    public function delete(Request $request, Offresindividuel $offresindividuel, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offresindividuel->getId(), $request->request->get('_token'))) {
            $entityManager->remove($offresindividuel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('offresindividuel_index', [], Response::HTTP_SEE_OTHER);
    }
}
