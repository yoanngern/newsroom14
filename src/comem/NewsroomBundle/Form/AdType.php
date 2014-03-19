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
            ->add('theme',          'entity', array(    'class'         => 'comemNewsroomBundle:Theme',
                                                        'empty_value'   => 'Sélectionner un thème',
                                                        'multiple'      => true,
                                                        'property'      => 'title'))
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
