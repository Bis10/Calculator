<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class CalculatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('num1', NumberType::class, [
                'label' => 'Enter First Number:',
                'constraints' => [new NotBlank(['message' => 'Please enter a number'])],
                'attr' => [
                    'step' => 'any',
                    'placeholder' => 'Enter a number',
                ],
            ])
            ->add('num2', NumberType::class, [
                'label' => 'Enter Second Number:',
                'constraints' => [new NotBlank(['message' => 'Please enter a number'])],
                'attr' => [
                    'step' => 'any',
                    'placeholder' => 'Enter a number',
                ],
            ])
            ->add('operation', ChoiceType::class, [
                'choices' => [
                    'Add' => 'add',
                    'Subtract' => 'subtract',
                    'Multiply' => 'multiply',
                    'Divide' => 'divide',
                ],
                'label' => 'Choose an Operation:',
                'constraints' => [new NotBlank(['message' => 'Please select an operation'])],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}
