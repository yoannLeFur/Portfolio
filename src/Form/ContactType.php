<?php


namespace App\Form;

use App\Entity\PortfolioContact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile', FileType::class, [
                'label' => 'Image (jpg, jpeg, png)',
                'data_class' => null,
                'required' => false,
            ])
            ->add('linkedinPath', TextType::class)
            ->add('githubPath', TextType::class)
            ->add('phone', TextType::class)
            ->add('email', EmailType::class);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => PortfolioContact::class,
            'translation_domain' => 'forms'
        ));
    }
}
