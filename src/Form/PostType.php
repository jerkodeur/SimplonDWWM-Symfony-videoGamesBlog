<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\Category;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('title', TextType::class, [
                'row_attr' => ['class' => 'my-2'],
                'label_attr' => ['class' => 'mb-1'],
            ])
            ->add('content', CKEditorType::class, [
                'row_attr' => ['class' => 'my-2'],
                'label_attr' => ['class' => 'mb-1'],
            ])
            ->add('image', TextType::class, [
                'row_attr' => ['class' => 'my-2'],
                'label_attr' => ['class' => 'mb-1'],
            ])
            ->add('category', EntityType::class, [
                'label' => 'Catégorie',
                'class' => Category::class,
                'row_attr' => ['class' => 'my-2'],
                'label_attr' => ['class' => 'mb-1'],
                'placeholder' => 'Choisir une catégorie',
                'choices' => null
                ])
            ->add('active', CheckboxType::class, [
                'label' => 'Publier l\'article ?',
                'row_attr' => ['class' => 'my-3'],
                'label_attr' => ['class' => 'mb-1'],
                'required' => false
            ])
            ->add('Valider', SubmitType::class, [
                'attr' => ['class' => 'btn-dark']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
