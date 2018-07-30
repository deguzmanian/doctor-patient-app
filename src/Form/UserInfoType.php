<?php

namespace App\Form;

use App\Entity\UserInfo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserInfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fname', TextType::class, array('attr' => ['label' => 'First Name' ,'class' => 'form-control', 'placeholder' => 'Enter First Name']))
            ->add('mname', TextType::class, array('attr' => ['class' => 'form-control', 'placeholder' => 'Enter Middle Name']))
            ->add('lname', TextType::class, array('attr' => ['class' => 'form-control', 'placeholder' => 'Enter Surname', 'required' => false]))
            ->add('suffix', null, array('attr' => ['class' => 'form-control', 'placeholder' => 'eg. Sr., Jr., Dr., PhD.']))
            ->add('gender', ChoiceType::class, array('choices' => array('Select Gender' => null,'Male' => 'Male', 'Female' => 'Female'), 'label' => 'Gender:', 'attr' => ['class' => 'form-control']))
            ->add('civil_status', ChoiceType::class, array('choices' => array('Civil Status' => null,'Single' => 'Single', 'Married' => 'Married', 'Widowed' =>'Widowed', 'Annulled' => 'Annulled'), 'attr' => ['class' => 'form-control']))
            ->add('address', TextType::class, array('label' => 'Current Address:', 'attr' => ['class' => 'form-control', 'placeholder' => '123 Main Street, Camp Sinukuban, Manila, Philippines', 'div' => '']))
            ->add('birthdate', DateType::class, array('widget'=> 'single_text', 'format'=>'MM/dd/yyyy', 'attr' => ['class' => 'datepicker form-control', 'placeholder' => 'mm/dd/yyyy']));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UserInfo::class,
        ]);
    }
}
