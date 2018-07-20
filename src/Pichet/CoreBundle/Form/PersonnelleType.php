<?php

namespace Pichet\CoreBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
                    'required' => true
                )
            )
            ->add(
                'email',
                TextType::class,
                array(
                    'required' => true
                )
            )
            ->add(
                'date',
                DateType::class,
                array(
//                    'label' => 'Date de naissance',
                    'required' => true,
                    'years' => range(date('Y')-70, date('Y')-10)
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
                    'attr' => array('class' => 'col-sm-12 control-label btn large btn-primary')
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
