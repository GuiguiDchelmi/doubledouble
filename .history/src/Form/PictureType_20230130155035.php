<?php

namespace App\Form;

use App\Entity\Pictures;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PictureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('project_id')
            ->add('name', TextType::class, [
            'attr' => [
                'class' => 'add-form-case',
                'minlength' => '2',
                'maxlength' => '55'
            ],
            'label' => 'Nom de l\'image',
            'label_attr' => [
                'class' => 'project-name'
            ],
            'constraints' => [
                new Assert\Length(['min' => 2, 'max' =>55]),
            ]
        ])
        ->add('description', TextType::class, [
            'label' => 'Description',
            'label_attr' => [
                'class' => 'project-name'
            ],
            'attr' => [
                'class' => 'add-form-case',
                'minlength' => '2',
                'maxlength' => '500',
                'rows' => 1,
                'cols' => 16
            ],
            'constraints' => [
                new Assert\Length(['min' => 2, 'max' =>500]),
                new Assert\NotBlank()
            ]
        ])
        ->add('createdAt', DateType::class, [
            'attr' => [
                'class' => 'add-form-case'
            ],
            'label_attr' => [
                'class' => 'project-name'
            ],
            'widget' => 'single_text',
            'input'  => 'datetime_immutable',
            'format' => 'yyyy-MM-dd'
        ])
        
        ->add('imageFile', VichImageType::class, [
            'label' => 'Photo du projet',
            'label_attr' => [
                'class' => 'project-name'
            ]
        ])
        ->add('submit', SubmitType::class, [
            'attr' => [
                'class' => 'valid-button'
            ],
            'label' => 'Ajouter mon image'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pictures::class,
        ]);
    }
}
