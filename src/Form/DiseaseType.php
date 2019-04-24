<?php

namespace App\Form;

use App\Entity\Disease;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiseaseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('disease_name', null, [
                'label' => 'Nom de la maladie'
            ])
            ->add('disease_therapy', null, [
                'label' => 'Traitement'
            ])
            ->add('disease_severity', null, [
                'label' => 'Sévérité de la maladie'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Disease::class,
        ]);
    }
}
