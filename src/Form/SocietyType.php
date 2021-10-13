<?php

namespace App\Form;

use App\Entity\Society;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SocietyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'required' =>true,
                ])
            ->add('description')
            //->add('date')
            ->add('image', FileType::class, [
                'mapped' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '3M',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg'
                        ]
                    ])
                ]
            ])
            ->add('category')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Society::class,
        ]);
    }
}
