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
            ->add('structure_name', null, [
                'label' => 'Nom de votre structure'
            ])
            ->add('structure_location', null, [
                'label' => 'Adresse'
            ])
            ->add('structure_city', null, [
                'label' => 'Ville'
            ])
            ->add('structure_zipcode', null, [
                'label' => 'Zipcode'
            ])
            ->add('structure_phone', null, [
                'label' => 'Numéro de téléphone'
            ])
            ->add('structure_type', null, [
                'label' => 'Type de structure'
            ])
            ->add('structure_siret', null, [
                'label' => 'Numéro de siret'
            ])
            ->add('structure_nbspace', null, [
                'label' => 'Nombre d\'espace'
            ])
            ->add('structure_typefood', null, [
                'label' => 'Type de nourriture'
            ])
            ->add('structure_mail', null, [
                'label' => 'Adresse email'
            ])
            ->add('description', null, [
                'label' => 'Courte description'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Structure::class,
        ]);
    }
}
