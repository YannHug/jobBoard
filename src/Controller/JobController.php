<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Repository\OffreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobController extends AbstractController
{
    #[Route('/', name: 'app_job')]
    public function index(OffreRepository $offreRepository): Response
    {
        return $this->render('job/index.html.twig', [
            'offres' => $offreRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_job_show', requirements: ['id' => '\d+'])]
    public function show(Offre $offre): Response
    {
        return $this->render('job/show.html.twig', [
            'offre' => $offre,
        ]);
    }

    #[Route('/new', name: 'app_job_new')]
    public function new(Request $request): Response
    {
        $submittedToken = $request->request->get('token');
        if ($this->isCsrfTokenValid('test-token', $submittedToken)) {

        }
        return $this->render('job/new.html.twig', [
            'nom' => $request->get('Nom'),
            'description' => $request->get('Description')
        ]);
    }

}
