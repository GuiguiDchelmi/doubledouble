<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $project = $form->getData();

            $manager->persist($project);
            $manager->flush();

            $this->addFlash(
                'success',
                'Le projet a bien été ajouté !'
            );

            return $this->redirectToRoute('project');
        }


        return $this->render('pages/project/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Route('/project/delete/{id}', 'project.delete', methods: ['GET'])]
    public function delete(EntityManagerInterface $manager, Project $project): Response
    {
        if (!$project) {
            $this->addFlash(
                'success',
                'Le projet demandé n\'a pas été trouvé'
            );
            return $this->redirectToRoute('project');
        }
        $manager->remove($project);
        $manager->flush();
        $this->addFlash(
            'success',
            'Le projet a été supprimé avec succès !'
        );
        return $this->redirectToRoute('project');
    }
}
