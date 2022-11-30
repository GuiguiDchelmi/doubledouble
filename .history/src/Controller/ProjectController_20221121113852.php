<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    #[Route('/project', 'project', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('pages/project/project.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }
}