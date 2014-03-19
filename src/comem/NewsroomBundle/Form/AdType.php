<?php

namespace comem\NewsroomBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',          'text')
            ->add('description',    'textarea', array('required' => false))
            ->add('link',           'text', array('required' => false))
            ->add('address',        'textarea', array('required' => false))
            ->add('phone',          'text', array('required' => false))
            ->add('grade',          'number')
            ->add('place',          'choice', array(
                                        'choices'   => array(
                                            'vd'    => 'Vaud',
                                            'ge'    => 'Genève',
                                            'fr'    => 'Fribourg',
                                            'ne'    => 'Neuchâtel',
                                            'vs'    => 'Valais',
                                            'ju'    => 'Jura',
                                            'ch'    => 'Suisse'
                                        ),
                                        'multiple'  => false,
                                        'empty_value'   => 'Sélectionner un lieu'))
            ->add('theme',          'choice', array(
                                        'choices'   => array(
                                            'alimentation'      => 'Alimentation',
                                            'hygiene'           => 'Hygiene',
                                            'social'            => 'Social',
                                            'aide'              => 'Aide',
                                            'sante'             => 'Santé',
                                            'accueil'           => 'Accueil',
                                            'personnes_agees'   => 'Personnes agées',
                                            'famille'           => 'Famille',
                                            'femme'             => 'Femme',
                                            'enfants'           => 'Enfants',
                                            'jeunes'            => 'Jeunes',
                                            'logements'         => 'Logements',
                                            'conseil'           => 'Conseil',
                                            'formation'         => 'Formation',
                                            'travail'           => 'Travail',
                                            'integration'       => 'Intégration',
                                            'renovation'        => 'Rénovation',
                                            'toxicomanie'       => 'Toxicomanie',
                                            'handicap'          => 'Handicap',
                                            'vetements'         => 'Vêtements',
                                            'tout'              => 'Tout',
                                            'transport'         => 'Transport',
                                            'finances'          => 'Finances',
                                            
                                        ),
                                        'multiple'  => true,
                                        'expanded'  => true))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'comem\NewsroomBundle\Entity\Ad'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'comem_newsroombundle_ad';
    }
}
