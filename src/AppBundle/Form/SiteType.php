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

class SiteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sitenom', null, [ 'required'=>true, 'label'=>'Nom du site', 'attr' => ['class'=> 'form-control']] )
            ->add('type', null, ['label'=>'Types de pratique', 'attr' => ['class'=> 'form-control']])
            ->add('longitude', null, ['attr' => ['class'=> 'form-control']])
            ->add('latitude', null, ['attr' => ['class'=> 'form-control']])
            ->add('description', TextareaType::class, [
                    'attr' => ['cols' => "40", 'rows'=>"5", 'class'=> 'form-control']
                    ] )
            ->add('ville', null, ['attr' => ['class'=> 'form-control']])
            ->add('adresse', null, ['attr' => ['class'=> 'form-control']])
            ->add('svalide', CheckboxType::class, [
                    'required' => false,
                    'label'=> 'Fiche validée ? ',
                    'attr' => ['class'=> 'form-control']
                    ])

            ->add('sregion', EntityType::class , array(
                    'class'=> 'AppBundle:Region',
                    'label'=> 'Région',
                    'choice_label' => 'rnom',
                    'multiple' => false,
                    'attr' => ['class'=> 'form-control']
                ))
            
            ->add( 'enregistrer',  SubmitType::class, 
                    ['attr' => ['class'=> 'form-control'] ] );
            
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Site'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_site';
    }


}
