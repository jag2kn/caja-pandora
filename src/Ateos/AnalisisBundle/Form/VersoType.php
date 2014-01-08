<?php

namespace Ateos\AnalisisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VersoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('capitulo')
            ->add('verso')
            ->add('texto')
            ->add('libro')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ateos\AnalisisBundle\Entity\Verso'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ateos_analisisbundle_verso';
    }
}
