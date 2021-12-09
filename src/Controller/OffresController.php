<?php

namespace App\Controller;

use App\Entity\Offres;
use App\Form\OffresType;
use App\Repository\OffresRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface; // Nous appelons le bundle KNP Paginator
/**
 * @Route("/offres")
 */
class OffresController extends AbstractController
{
    /**
     * @Route("/", name="offres_index", methods={"GET"})
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
// Nous ajoutons les paramètres requis

    // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri//

    $donnees = $this->getDoctrine()->getRepository(offres::class)->findAll();

    $offresRepository = $paginator->paginate(
        $donnees, // Requête contenant les données à paginer (ici nos articles)
        $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
        3    // Nombre de résultats par page
    );

        return $this->render('offres/index.html.twig', [
            'offres' => $offresRepository,
        ]);
    }

    /**
     * @Route("/new", name="offres_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $offre = new Offres();
        $form = $this->createForm(OffresType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($offre);
            $entityManager->flush();

            return $this->redirectToRoute('offres_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('offres/new.html.twig', [
            'offre' => $offre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="offres_show", methods={"GET"})
     */
    public function show(Offres $offre): Response
    {
        return $this->render('offres/show.html.twig', [
            'offre' => $offre,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="offres_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Offres $offre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OffresType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('offres_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('offres/edit.html.twig', [
            'offre' => $offre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="offres_delete", methods={"POST"})
     */
    public function delete(Request $request, Offres $offre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offre->getId(), $request->request->get('_token'))) {
            $entityManager->remove($offre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('offres_index', [], Response::HTTP_SEE_OTHER);
    }
}
