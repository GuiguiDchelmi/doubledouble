<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjectController extends AbstractController
{
    #[Route('/project', 'project', methods: ['GET'])]
    public function index(ProjectRepository $repository): Response
    {

        return $this->render('pages/project/project.html.twig', [
            'projects' => $repository->findAll()
        ]);
    }
}