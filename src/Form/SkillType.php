<?php


namespace App\Form;

use App\Entity\PortfolioSkill;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SkillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile', FileType::class, [
                    'label' => 'Image (jpg, jpeg)',
                    'data_class' => null,
                    'required' => false,
                ])
            ->add('title', TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => PortfolioSkill::class,
            'translation_domain' => 'forms'
        ));
    }

}
