<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    #[Route('/about', 'about', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('pages/about/about.html.twig', [
            'controller_name' => 'AboutController',
        ]);
    }
}
