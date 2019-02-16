<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('date', DateTimeType::class)
        ->add('titre', null, ['attr' => ['class' => 'form-control']])
        ->add('contenu', TextareaType::class, [
                    'attr' => ['cols' => '40', 'rows' => '5', 'class' => 'form-control'],
                    ])
        ->add('nauteur', EntityType::class, [
                    'class' => 'AppBundle:Membre',
                    'label' => 'Auteur',
                    'choice_label' => 'email',
                    'multiple' => false,
                    'required' => true,
                    'attr' => ['class' => 'form-control'],
                ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\News',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_news';
    }
}
