<?php

namespace App\Controller;

use App\Entity\Project;
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
    #[Route('/project/add', 'project.add', methods: ['GET', 'POST'])]
    	public function new() : Response {
   	    $project = new Project();
    	$form = $this->createForm(ProjectType::class, $project);

        return $this->render('pages/project/add.html.twig', [
            'form' =>form->createView()
        ]);
}
}