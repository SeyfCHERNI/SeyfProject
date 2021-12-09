<?php

namespace App\Controller;

use App\Entity\Offresgroupes;
use App\Form\OffresgroupesType;
use App\Repository\OffresgroupesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface; // Nous appelons le bundle KNP Paginator
use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * @Route("/offresgroupes")
 */
class OffresgroupesController extends AbstractController
{
/**
     * @Route("/generatepdf", name="generatepdf")
     */
    public function generatePdf(Request $request, PaginatorInterface $paginator){
        $donnees = $this->getDoctrine()->getRepository(offresgroupes::class)->findAll();

        
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('offresgroupes/pdf.html.twig', [
            'title' => "Liste des offres",
            'offresgroupes' => $donnees,
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => true
        ]);
        return $this->render('offresgroupes/index.html.twig', [
            'offresgroupes' => $offresgroupesRepository,
        ]);
    }




    /**
     * @Route("/", name="offresgroupes_index", methods={"GET"})
     */
    public function index(Request $request, PaginatorInterface $paginator) // Nous ajoutons les paramètres requis
    {
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri//

        $donnees = $this->getDoctrine()->getRepository(offresgroupes::class)->findAll();

        $offresgroupesRepository = $paginator->paginate(
            $donnees, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            2 // Nombre de résultats par page
        );
    
        return $this->render('offresgroupes/index.html.twig', [
            'offresgroupes' => $offresgroupesRepository,
        ]);
    }


    /**
     * @Route("/new", name="offresgroupes_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $offresgroupe = new Offresgroupes();
        $form = $this->createForm(OffresgroupesType::class, $offresgroupe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($offresgroupe);
            $entityManager->flush();

            return $this->redirectToRoute('offresgroupes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('offresgroupes/new.html.twig', [
            'offresgroupe' => $offresgroupe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="offresgroupes_show", methods={"GET"})
     */
    public function show(Offresgroupes $offresgroupe): Response
    {
        return $this->render('offresgroupes/show.html.twig', [
            'offresgroupe' => $offresgroupe,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="offresgroupes_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Offresgroupes $offresgroupe, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OffresgroupesType::class, $offresgroupe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('offresgroupes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('offresgroupes/edit.html.twig', [
            'offresgroupe' => $offresgroupe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="offresgroupes_delete", methods={"POST"})
     */
    public function delete(Request $request, Offresgroupes $offresgroupe, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offresgroupe->getId(), $request->request->get('_token'))) {
            $entityManager->remove($offresgroupe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('offresgroupes_index', [], Response::HTTP_SEE_OTHER);
    }

  

   
}
