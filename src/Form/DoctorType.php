<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\UserInfo;
use App\Form\UserInfoType;
use App\Entity\AccreditationInfo;
use App\Form\AccreditationInfoType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DoctorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, array('attr' => ['class' => 'form-control', 'placeholder' => 'Username']))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password', 'attr' => ['class' => 'form-control', 'placeholder' => 'Password']),
                'second_options' => array('label' => 'Repeat Password', 'attr' => ['class' => 'form-control', 'placeholder' => 'Repeat Password']),
            ))

            ->add('userinfo', UserInfoType::class)

            ->add('accreditationinfo', AccreditationInfoType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
