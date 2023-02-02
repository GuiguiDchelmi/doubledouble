<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProjectRepository;

class IndexController extends AbstractController
{
    #[Route('/index', 'index', methods: ['GET'])]
    public function index(ProjectRepository $repository): Response
    {
        return $this->render('pages/index/index.html.twig', [
            'projects' => $repository->findAll()
        ]);
    }
}
