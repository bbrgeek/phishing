<?php

namespace Pichet\CoreBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonnelleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'nom',
                TextType::class,
                array(
//                    'label' => 'Nom',
                    'required' => true
                )
            )
            ->add(
                'prenom',
                TextType::class,
                array(
                    'label' => 'Prénom',
                    'required' => true
                )
            )
            ->add(
                'email',
                TextType::class,
                array(
                    'label' => 'Email',
                    'required' => true
                )
            )
            ->add(
                'date',
                DateTimeType::class,
                array(
                    'required' => true
                )
            )

            ->add(
                'ville',
                TextType::class,
                array(
                    'required' => true
                )
            )
            ->add(
                'transport',
                ChoiceType::class,
                array(
                    'multiple' => false,
                    'required' => true,
                    'attr' => array('class' => 'radio-button'),
                    'expanded' => true,
                    'choices'  => array(
                        'En voiture' => 'voiture',
                        'En transport en commun' => 'commun',
                        'En co-voiturage' => 'covoiturage'
                    )
                )
            )
            ->add('save',
                SubmitType::class,
                array(
                    'label' => 'Page suivante',
                    'attr' => array('class' => 'btn large btn-primary')
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
            'data_class' => 'Pichet\CoreBundle\Entity\Personnelle'
        ));
    }


}
