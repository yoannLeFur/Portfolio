<?php


namespace App\Form;

use App\Entity\PortfolioAbout;
use App\Entity\PortfolioExperience;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExperienceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile', FileType::class, [
                    'label' => 'Image (jpg, jpeg)',
                    'data_class' => null,
                    'required' => false,
                ])
            ->add('title', TextType::class)
            ->add('content', TextareaType::class)
            ->add('experience_date', TextType::class)
            ->add('path', TextType::class, [
                'required'   => false,
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => PortfolioExperience::class,
            'translation_domain' => 'forms'
        ));
    }

}
