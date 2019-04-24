<?php

namespace App\Form;

use App\Entity\Application1Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Application1TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('startedAt')
            ->add('finishedAt')
            ->add('objectifs')
            ->add('user')
            ->add('datesComplete')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Application1Task::class,
        ]);
    }
}
