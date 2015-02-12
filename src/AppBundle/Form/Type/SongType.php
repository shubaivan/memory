<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use AppBundle\Entity\Video;

class SongType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameSong', 'text')
            ->add('chord', 'text')
            ->add('author', 'text')
            ->add('album', 'entity', array(
                    'class' => 'AppBundle\Entity\Album',
                    'property' => 'name',
                    'required' => 'false'
                ))

            ->add('save', 'submit')
            ->getForm();
    }

    public function getName()
    {
        return 'song';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Song',
        ));
    }
}

