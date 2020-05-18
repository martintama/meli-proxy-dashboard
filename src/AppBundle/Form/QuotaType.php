<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;


class QuotaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('criteria', ChoiceType::class, array(
                'choices'  => [
                    'IP Origen' => 'ip',
                    'Path' => 'path',
                    'Access token' => 'token',
                ],
                'placeholder' => '- Seleccione -'
            ))
            ->add('key', TextType::class, array(
            ))
            ->add('maxCount', NumberType::class, array(
                'scale' => 0
            ))
            ->add('refillDelaySeconds', NumberType::class, array(
                'scale' => 0
            ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Quota'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_quota';
    }


}
