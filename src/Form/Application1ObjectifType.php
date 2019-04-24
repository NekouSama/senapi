<?php

namespace App\Form;

use App\Entity\Application1Objectif;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Application1ObjectifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('startedAt')
            ->add('finishedAt')
            ->add('benchmark')
            ->add('successRate')
            ->add('tasks')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Application1Objectif::class,
        ]);
    }
}
