<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('link', 'text')
            ->add('title', 'text')
            ->add('description', 'textarea')
            ->add('author', 'text')
            ->add('year', 'integer')
            ->add('chord', 'collection', array('type' => new ChordType()))
            ->add('album', 'collection', array('type' => new AlbumType()))
            ->add('save', 'submit');

        $builder->getForm();
    }
    public function getName()
    {
        return 'video';
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Video',
        ));
    }
}
