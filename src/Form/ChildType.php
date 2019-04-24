<?php

namespace App\Form;

use App\Entity\Child;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChildType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Child_name', null, [
                'label' => 'Nom de l\'enfant'
            ])
            ->add('Child_firstname', null, [
                'label' => 'Prénom de l\'enfant'
            ])
            ->add('Child_years', null, [
                'label' => 'Âge de l\'enfant'
            ])
            ->add('Child_Others', null, [
                'label' => 'Autres informations'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Child::class,
        ]);
    }
}
