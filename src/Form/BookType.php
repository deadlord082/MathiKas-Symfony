<?php
// src/Form/BookType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeImmutable;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'constraints' =>  new Length(['max' => 255]),
            ])
            ->add('isbn', TextType::class, [
                'constraints' =>  new Length(['max' => 255]),
            ])
            ->add('author', TextType::class, [
                'constraints' =>  new Length(['max' => 255]),
            ])
            ->add('resume', TextType::class, [
                'constraints' =>  new Length(['max' => 255]),
            ])
            ->add('save', SubmitType::class)
        ;
    }
}
