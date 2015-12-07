<?php

namespace Sati\ControleSatiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BoletoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bolCodigobarra')
            ->add('fkUsuId')
            ->add('bolDatavencimento')
            ->add('bolValor')
            ->add('bolStatus')
            ->add('fkEventeventos')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sati\ControleSatiBundle\Entity\Boleto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sati_controlesatibundle_boleto';
    }
}
