<?php

namespace Front\TopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActivitiesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('id')
            ->add('name')
            ->add('name_ru')
            ->add('name_en')
            ->add('about')
            ->add('about_ru')
            ->add('about_en')
            ->add('url')
            ->add('is_activated')
            //->add('created_at')
            //->add('updated_at')
            ->add('project')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Front\TopBundle\Entity\Activities'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'front_topbundle_activities';
    }


}
