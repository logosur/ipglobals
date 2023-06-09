<?php

namespace App\Presentation\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class PostFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'required' => true,
                'constraints' => [
                    new Assert\Length([
                        'min' => 5,
                    ])],
                'documentation' => [
                    'type' => 'string', // would have been automatically detected in this case
                    'description' => 'Title (min. 5)',
                ],
            ])
            ->add('body', TextareaType::class, [
                'required' => true,
                'constraints' => [
                    new Assert\Length([
                        'min' => 3,
                    ])],
                'documentation' => [
                    'type' => 'string', // would have been automatically detected in this case
                    'description' => 'Body (min. 3)',
                ],
            ])
            ->add('Send', SubmitType::class, [
                'label' => 'Send',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'csrf_protection' => false,
        ]);
    }
}
