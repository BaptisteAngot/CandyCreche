<?php

namespace App\Form;

use App\Entity\Structure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationStructureFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('structureMail')
            ->add('structureName')
            ->add('structureLocation')
            ->add('structureCity')
            ->add('structureZipcode')
            ->add('structureSiret')
            ->add('structurePhone')
            ->add('structureType')
            ->add('structureNbspace')
            ->add('structureTypefood')
            ->add('description')

            ->add('structureLocation')
            ->add('structurePassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmer votre mot de passe']
            ])
        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Structure::class
        ]);
    }
}
