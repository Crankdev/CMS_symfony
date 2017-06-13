<?php

namespace Front\TopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PeopleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('who', TextareaType::class , array(
                'required'   => false,
                'empty_data' => 'Волонтер'))
            ->add('name_ru')
            ->add('who_ru', TextareaType::class , array(
                'required'   => false,
                'empty_data' => 'Волонтер'))
            ->add('name_en')
            ->add('who_en', TextareaType::class , array(
                'required'   => false,
                'empty_data' => 'Volunteer'))
            ->add('foto', FileType::class, array('label' => 'Img '))
            ->add('mail')
            ->add('phone')
            ->add('facebook')
            ->add('activities');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Front\TopBundle\Entity\People'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'front_topbundle_people';
    }


}
