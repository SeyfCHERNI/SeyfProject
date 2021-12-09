<?php

namespace App\Form;

use App\Entity\Offresgroupes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffresgroupesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Descriptif_groupes')
            ->add('Date_expiration')
            ->add('Prix_groupes')
            ->add('Offresgroupes')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offresgroupes::class,
        ]);
    }
}
