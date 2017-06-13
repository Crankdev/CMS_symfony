<?php

namespace Front\MenuBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
<<<<<<< HEAD
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
=======
>>>>>>> parent of 5f11dee... Update admin bundle

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
            ->add('about', TextareaType::class , array(
                'required'   => false))
            ->add('about_ru', TextareaType::class , array(
                'required'   => false))
            ->add('about_en', TextareaType::class , array(
                'required'   => false))
            ->add('locales')
            ->add('url')
            ->add('is_activated')
<<<<<<< HEAD
            ->add('foto', FileType::class, array('label' => 'Img ','data_class' => null,'required' => false ))
=======
            ->add('foto')
>>>>>>> parent of 5f11dee... Update admin bundle
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
