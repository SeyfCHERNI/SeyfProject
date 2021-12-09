<?php

namespace App\Form;

use App\Entity\Offresindividuel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffresindividuelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('descriptif_individuel')
            ->add('Expiration')
            ->add('prix_individuel')
            ->add('Offresindividuel')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offresindividuel::class,
        ]);
    }
}
