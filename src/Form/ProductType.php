<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType; // Adaugat
use Symfony\Component\Form\Extension\Core\Type\TextareaType; // Adaugat
use Symfony\Component\Form\Extension\Core\Type\IntegerType; // Adaugat
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // 1. Nume: TextType
            ->add('name', TextType::class, [
                'label' => 'Nume Produs'
            ])

            // 2. Descriere: TextareaType (pentru text lung)
            ->add('description', TextareaType::class, [
                'label' => 'Descriere Produs',
                'required' => false, // Este setat nullable: true in Entitate
            ])

            // 3. Dimensiune: IntegerType
            ->add('size', IntegerType::class, [
                'label' => 'Dimensiune (Valoare Numerică)'
            ])

            // Butonul de Salvare este lăsat, dar clasa de stilizare se aplică în _form.html.twig
            // Daca nu il adaugi aici, formularul va include automat un buton de submit.
            // Il poti lasa comentat daca vrei sa folosesti doar butonul stilizat din _form.html.twig
            /*
            ->add('save', SubmitType::class, [
                'label' => 'Salvează',
                'attr' => ['class' => 'btn-primary']
            ])
            */
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
            // Adaugam un atribut 'attr' care va fi folosit de Twig pentru a stiliza formularul
            'attr' => ['id' => 'product-form']
        ]);
    }
}
