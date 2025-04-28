<?php
// src/Form/ArticleType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeImmutable;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateTimeImmutable::class)
            ->add('title', TextType::class, [
                'constraints' =>  new Length(['max' => 255]),
            ])
            ->add('content', TextType::class, [
                'constraints' =>  new Length(['max' => 255]),
            ])
            ->add('save', SubmitType::class)
        ;
    }
}
