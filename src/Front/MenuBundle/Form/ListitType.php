<?php

namespace Front\MenuBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('name_ru')
            ->add('name_en')
            ->add('about')
            ->add('about_ru')
            ->add('about_en')
            ->add('locales')
            ->add('url')
            ->add('is_activated')
            ->add('foto')
            ->add('youtube')
           // ->add('updated_at')
            ->add('menu');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Front\MenuBundle\Entity\Listit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'front_menubundle_listit';
    }


}
