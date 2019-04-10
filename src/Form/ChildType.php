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
            ->add('Child_name')
            ->add('Child_firstname')
            ->add('Child_years')
            ->add('Child_Others')
            ->add('Child_created_at')
            ->add('Child_updated_at')
            ->add('Child_id_parent')
            ->add('diseases')
            ->add('allergies')
            ->add('equipment')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Child::class,
        ]);
    }
}
