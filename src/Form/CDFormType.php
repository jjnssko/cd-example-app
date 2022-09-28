<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CDFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
	{
		$builder
            ->add('image', FileType::class, [
                'label' => 'Obrázek',
                'required'=> false,
                'mapped' => false,
            ])
			->add('title', TextType::class, [
				'label' => 'Název CD',
                'required' => true,
			])
			->add('artist', TextType::class, [
				'label' => 'Interpret',
                'required' => true,
			])
			->add('album', TextType::class, [
                'label' => 'Album',
            ])
			->add('genre', TextType::class, [
                'label' => 'Žánr',
                'required' => true,
			])
			->add('releaseYear', DateType::class, [
                'label' => 'Rok vydání',
                'required' => true,
            ])
            ->add('price', MoneyType::class, [
              'label' => 'Cena',
              'required' => true,
              'currency' => 'CZK',
            ])
            ->add('rating', NumberType::class, [
              'label' => 'Hodnocení',
              'required' => true,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Uložit',
                'attr' => [
                  'class' => 'btn btn-success btn-sm'
                ],
            ])
        ;
	}
}
