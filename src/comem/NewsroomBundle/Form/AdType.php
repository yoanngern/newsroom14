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
            ->add('description',    'textarea')
            ->add('link',           'text')
            ->add('address',        'textarea', array('required' => false))
            ->add('phone',          'text', array('required' => false))
            ->add('grade',          'number')
            ->add('category',       'text')
            ->add('category',       'choice', array(
                                        'choices'   => array(
                                            'alimentation'  => 'Alimentation',
                                            'logement'      => 'Logement',
                                            'social'        => 'Social',
                                            'travail'       => 'Travail',
                                            'hygiene'       => 'Hygiène'
                                        ),
                                        'expanded' => true,
                                        'multiple'  => true,
                                        'empty_value'   => 'Catégorie'))
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
