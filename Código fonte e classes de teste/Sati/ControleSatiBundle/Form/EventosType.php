<?php

namespace Sati\ControleSatiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomeEvento')
            ->add('fkPalId')
            ->add('dataHora')
            ->add('tipoEvento')
            ->add('valor')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sati\ControleSatiBundle\Entity\Eventos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sati_controlesatibundle_eventos';
    }
}
