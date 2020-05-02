<?php


namespace App\Form;

use App\Entity\PortfolioFormation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile', FileType::class, [
                    'label' => 'Image (jpg, jpeg, png)',
                    'data_class' => null,
                    'required' => false,
                ])
            ->add('content', TextareaType::class)
            ->add('school_name', TextType::class)
            ->add('school_date', TextType::class)
            ->add('path', TextType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => PortfolioFormation::class,
            'translation_domain' => 'forms'
        ));
    }

}
