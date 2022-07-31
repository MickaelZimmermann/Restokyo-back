<?php

namespace App\Form;

use DateTime;
use App\Entity\District;
use App\Entity\Establishment;
use App\Entity\Tag;
use Doctrine\ORM\EntityRepository;
use PhpParser\Node\Stmt\Label;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimezoneType;


class EstablishmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Restaurant' => 'Restaurant',
                    'Izakaya' => 'Izakaya',
                ],
            ])
            ->add('description', TextareaType::class)
            ->add('address', TextType::class, [
                'label' => 'Adresse'
            ])
            ->add('district', EntityType::class, [
                'class' => District::class,
                'label' => 'Quartier',
                'choice_label' => 'name',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('d')
                        ->orderBy('d.name', 'ASC');
                },
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Statut',
                'choices' =>[
                    'Proposé' => 0,
                    'Activé' => 1,
                    'Désactivé' => 2,
                ]
            ])
            ->add('tags', EntityType::class, [
                'class' => Tag::class,
                'label' => 'Spécialités',
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'row_attr' => ['class' => 'row'],
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.name', 'ASC');
                },

            ])
            ->add('openingtime', TextareaType::class, [
                'label' => 'Horaires d\'ouverture',
            ])
            ->add('website', UrlType::class, [
                'label' => 'Site web',
                'required' => false,
            ])
            ->add('phone', IntegerType::class, [
                'label' => 'Téléphone',
                'required' => false,
            ])
            ->add('picture', UrlType::class, [
                'label' => 'Photo',                
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Establishment::class,
        ]);
    }
}
