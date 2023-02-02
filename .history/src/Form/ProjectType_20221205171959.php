<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('title', TextType::class, [
            'attr' => [
                'class' => 'form-case',
                'minlength' => '2',
                'maxlength' => '50'
            ],
            'label' => 'Nom du projet',
            'label_attr' => [
                'class' => 'project-name'
            ],
            'constraints' => [
                new Assert\Length(['min' => 2, 'max' =>55]),
                new Assert\NotBlank()
            ]
        ])
        ->add('description', TextType::class, [
            'attr' => [
                'class' => 'form-case',
                'minlength' => '2',
                'maxlength' => '50'
            ],
            'label' => 'Description',
            'label_attr' => [
                'class' => 'project-name'
            ],
            'constraints' => [
                new Assert\Length(['min' => 2, 'max' =>500]),
                new Assert\NotBlank()
            ]
        ])
        ->add('createdAt', DateType::class, [
            'attr' => [
                'class' => 'form-case'
            ],
            'label_attr' => [
                'class' => 'project-name'
            ],
            'widget' => 'single_text',
            'input'  => 'datetime_immutable',
            'format' => 'yyyy-MM-dd'
        ])
        /*->add('imageFile', VichImageType::class, [
            'label' => 'Image du projet',
            'label_attr' => [
                'class' => 'project-name'
            ]
        ])*/
        ->add('submit', SubmitType::class, [
            'attr' => [
                'class' => 'valid-button'
            ],
            'label' => 'Ajouter mon projet'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}