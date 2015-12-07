<?php

namespace Sati\ControleSatiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CaixaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipoMovimentacao')
            ->add('statusMoventacao')
            ->add('data')
            ->add('origem')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sati\ControleSatiBundle\Entity\Caixa'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sati_controlesatibundle_caixa';
    }
}
