<?php

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class,[
                'label' => 'Titre'
            ,
                'attr' =>[
                    'placeholder' => 'saisir le titre'   
                ]
            ])
            ->add('content', TextType::class,[
                'label' => 'Contenu'
            ,
                'attr' =>[
                    'placeholder' => 'saisir le contenu'   
                ]
            ])
            ->add('createdAt', TextType::class,[
                'label' => 'Date de création'
            ,
                'attr' =>[
                    'placeholder' => 'saisir la date de création'   
                ]
            ])
            ->add('expiredAt', TextType::class,[
                'label' => 'Date d\'expiration'
            ,
                'attr' =>[
                    'placeholder' => 'saisir la date d\'expiration'   
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Ajouter'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}