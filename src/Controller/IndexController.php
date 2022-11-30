<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/index', 'index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('pages/index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}