<?php

namespace App\Controller;

use App\Entity\Pictures;
use App\Form\PictureType;
use App\Repository\PicturesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GalleryController extends AbstractController
{
    #[Route('/gallery', 'gallery',  methods: ['GET'])]
    public function index(PicturesRepository $picRepository): Response
    {
        dd($picRepository->findAll());
        return $this->render('/pages/gallery/gallery.html.twig', 
            [ 'pictures' => $picRepository->findAll() ]
        );
    }
    
    #[Route('/gallery/{id}', 'gallery.id',  methods: ['GET'])]
    public function OnTest(PicturesRepository $picRepository, $id): Response
        {
            //dd($picRepository->OnveutfaireunorderBy($id));
            return $this->render('/pages/gallery/id.html.twig', 
            [ 'pictures' => $picRepository->OnveutfaireunorderBy($id) ]);
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
                'successPic',
                'L\'image a bien été ajoutée !'
            );

            return $this->redirectToRoute('gallery');
        }


        return $this->render('pages/gallery/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Security("is_granted('ROLE_ADMIN')")]
    #[Route('/gallery/delete/{id}', 'gallery.delete', methods: ['GET'])]
    public function delete(EntityManagerInterface $manager, Pictures $picture): Response
    {
        if (!$picture) {
            $this->addFlash(
                'successPic',
                'L\'image demandée n\'a pas été trouvée'
            );
            return $this->redirectToRoute('gallery');
        }
        $manager->remove($picture);
        $manager->flush();
        $this->addFlash(
            'successPic',
            'L\'image a été supprimée avec succès !'
        );
        return $this->redirectToRoute('gallery');
    }
}

