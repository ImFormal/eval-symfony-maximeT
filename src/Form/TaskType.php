<?php

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType; 

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class,[
                'label' => 'Titre',
                'attr' =>[
                    'placeholder' => 'saisir le titre'   
                ],
                'required'=>true
            ])
            ->add('content', TextareaType::class,[
                'label' => 'Contenu',
                'attr' =>[
                    'placeholder' => 'saisir le contenu'   
                ],
                'required'=>true
            ])
            ->add('createdAt', DateType::class,[
                'label' => 'Date de création',
                'attr' =>[
                    'placeholder' => 'saisir la date de création'   
                ],
                'required'=>true
            ])
            ->add('expiredAt', DateType::class,[
                'label' => 'Date d\'expiration',
                'attr' =>[
                    'placeholder' => 'saisir la date d\'expiration'   
                ],
                'required'=>true
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