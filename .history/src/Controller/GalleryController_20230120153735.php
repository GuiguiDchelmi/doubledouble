<?php

namespace App\Controller;


use App\Entity\Pictures;
use App\Form\PictureType;
use App\Repository\PicturesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GalleryController extends AbstractController
{
    #[Route('/gallery', 'gallery',  methods: ['GET'])]
    public function index(PicturesRepository $repository): Response
    {
        return $this->render('/pages/gallery/gallery.html.twig', [
            'pictures' => $repository->findAll()
        ]);
    }
    
    #[Route('/gallery/add', 'gallery.add', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $picture = new Pictures();
        $form = $this->createForm(PictureType::class, $picture);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $picture = $form->getData();

            $manager->persist($picture);
            $manager->flush();

            $this->addFlash(
                'success',
                'La photo a bien été ajoutée !'
            );

            return $this->redirectToRoute('gallery');
        }


        return $this->render('pages/gallery/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Security("is_granted('ROLE_ADMIN')")]
    #[Route('/gallery/delete/{id}', 'gallery.delete', methods: ['GET'])]
    public function delete(EntityManagerInterface $manager, Picture $picture): Response
    {
        if (!$picture) {
            $this->addFlash(
                'success',
                'La photo demandée n\'a pas été trouvée'
            );
            return $this->redirectToRoute('gallery');
        }
        $manager->remove($picture);
        $manager->flush();
        $this->addFlash(
            'success',
            'La photot a été supprimée avec succès !'
        );
        return $this->redirectToRoute('gallery');
    }
}

