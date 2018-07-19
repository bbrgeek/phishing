<?php

namespace Pichet\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrepriseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'service',
                TextType::class,
                array(
                    'required' => true
                )
            )
            ->add(
                'manager',
                TextType::class,
                array(
                    'required' => true
                )
            )
            ->add(
                'deplacement',
                ChoiceType::class,
                array(
                    'multiple' => false,
                    'required' => true,
                    'attr' => array('class' => 'radio-button'),
                    'expanded' => true,
                    'choices'  => array(
                        '1 fois par semaine' => 'voiture',
                        '2 fois par semaine' => 'commun',
                        '1 fois par mois' => 'covoiturage'
                    )
                )
            )

            ->add(
                'telephone',
                TextType::class,
                array(
                    'required' => true
                )
            )

            ->add('save',
                SubmitType::class,
                array(
                    'label' => 'Finir l\'enquête et télécharger mes places',
                    'attr' => array('class' => 'col-xs-8 col-md-12 btn large btn-primary')
                )
            );
        ;

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pichet\CoreBundle\Entity\Entreprise'
        ));
    }


}
