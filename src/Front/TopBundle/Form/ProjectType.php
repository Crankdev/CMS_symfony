<?php

namespace Front\TopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProjectType extends AbstractType
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
            ->add('about', TextareaType::class , array(
                'required'   => false))
            ->add('about_ru', TextareaType::class , array(
                'required'   => false))
            ->add('about_en', TextareaType::class , array(
                'required'   => false))
            //->add('created_at')
            //->add('updated_at')
            //->add('activities')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Front\TopBundle\Entity\Project'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'front_topbundle_project';
    }


}
