<?php

namespace App\Form;

use App\Entity\Structure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StructureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('structure_name')
            ->add('structure_location')
            ->add('structure_city')
            ->add('structure_zipcode')
            ->add('structure_phone')
            ->add('structure_type')
            ->add('structure_siret')
            ->add('structure_nbspace')
            ->add('structure_typefood')
            ->add('structure_mail')
            ->add('description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Structure::class,
        ]);
    }
}
