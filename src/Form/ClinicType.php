<?php
namespace App\Form;
use App\Entity\Clinic;
use App\Entity\Form\DataTransformer\DateToStringTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\OptionsResolver\OptionsResolver;
class ClinicType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clinicName', TextType::class, array('attr' => ['class' => 'form-control', 'placeholder' => 'Clinic Name']))
            ->add('email', EmailType::class, array('attr' => ['class' => 'form-control', 'placeholder' => 'Clinic Email']))
            ->add('schedStart', TimeType::class, [
                'label' => 'Opening Time'
            ])
            ->add('schedEnd', TimeType::class, [
                'label' => 'Closing Time'
            ]);
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Clinic::class,
        ));
    }
}