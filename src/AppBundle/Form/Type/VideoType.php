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

            ->add('album', 'text')
            ->add('save', 'submit');
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
