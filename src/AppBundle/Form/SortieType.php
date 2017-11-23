<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class SortieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateTimeType::class, array(
            /*'placeholder' => array(
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                    'hour' => 'Hour', 'minute' => 'Minute', 'second' => 'Second',
                    ) */
            ))
            //->add('datecreated')
            ->add('annonce', TextareaType::class, [
                    'attr' => ['cols' => "40", 'rows'=>"5", 'class'=> 'form-control']
                    ] )
            ->add('niveaumin', null, ['attr' => ['class'=> 'form-control']])
            ->add('niveaumax', null, ['attr' => ['class'=> 'form-control']])
            ->add('ssite', EntityType::class , array(
                    'class'=> 'AppBundle:Site',
                    'label'=> 'Site',
                    'choice_label' => 'sitenom',
                    'multiple' => false,
                    'attr' => ['class'=> 'form-control']
                ))
            ->add('organisateur', EntityType::class , array(
                    'class'=> 'AppBundle:Membre',
                    'label'=> 'Organisateur',
                    'choice_label' => 'email',
                    'multiple' => false,
                    'attr' => ['class'=> 'form-control']
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Sortie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_sortie';
    }


}
