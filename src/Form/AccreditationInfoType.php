<?php

namespace App\Form;

use App\Entity\AccreditationInfo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class AccreditationInfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('accreditationCode', TextType::class, array('attr' => ['class' => 'form-control','placeholder' => 'Code']))
            ->add('accreditationDate', DateType::class, array('widget'=> 'single_text', 'format'=>'MM/dd/yyyy', 'attr' => ['class' => 'datepicker form-control', 'placeholder' => 'mm/dd/yyyy']))
            ->add('accreditationExpDate', DateType::class, array('widget'=> 'single_text', 'format'=>'MM/dd/yyyy', 'attr' => ['class' => 'datepicker form-control', 'placeholder' => 'mm/dd/yyyy']))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AccreditationInfo::class,
        ]);
    }
}
