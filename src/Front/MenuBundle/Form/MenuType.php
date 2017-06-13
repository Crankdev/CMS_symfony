<?php

namespace Front\MenuBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class MenuType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('name_ru')
            ->add('name_en')
            ->add('url')
            ->add('description', TextareaType::class , array(
                'required'   => false,
                'empty_data' => 'Сила Духа'))
            ->add('description_ru', TextareaType::class , array(
                'required'   => false,
                'empty_data' => 'Сила Духа'))
            ->add('description_en', TextareaType::class , array(
                'required'   => false,
                'empty_data' => 'Power of Spirit'))
            ->add('title', TextareaType::class , array(
                'required'   => false,
                'empty_data' => 'Сила Духа'))
            ->add('title_ru', TextareaType::class , array(
                'required'   => false,
                'empty_data' => 'Сила Духа'))
            ->add('title_en', TextareaType::class , array(
                'required'   => false,
                'empty_data' => 'Power of Spirit'))
            ->add('keywords', TextareaType::class , array(
                'required'   => false,
                'empty_data' => 'Сила Духа'))
            ->add('keywords_ru', TextareaType::class , array(
                'required'   => false,
                'empty_data' => 'Сила Духа'))
            ->add('keywords_en', TextareaType::class , array(
                'required'   => false,
                'empty_data' => 'Power of Spirit'))
            ->add('icon')
            ->add('is_activated')
            ->add('menu');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Front\MenuBundle\Entity\Menu'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'front_menubundle_menu';
    }


}
