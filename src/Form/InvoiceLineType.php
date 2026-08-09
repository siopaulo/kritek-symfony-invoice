<?php

namespace App\Form;

use App\Entity\InvoiceLine;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceLineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description', TextareaType::class)
            ->add('quantity', IntegerType::class)
            ->add('amount', NumberType::class, [
                'scale' => 2,
                'input' => 'string',
            ])
            ->add('vatAmount', NumberType::class, [
                'scale' => 2,
                'input' => 'string',
            ])
            ->add('totalWithVat', NumberType::class, [
                'scale' => 2,
                'input' => 'string',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InvoiceLine::class,
        ]);
    }
}
