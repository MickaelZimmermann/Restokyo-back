<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class)
            ->add('pseudo', TextType::class)
            ->add('lastname', TextType::class, [
                'label' => 'Nom de famille',
                'required' => false,
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prènom',
                'required' => false,
            ])           
            ->add('nationality', TextType::class, [
                'label' => 'Nationnalité',
                'required' => false,
            ])
            ->add('picture', UrlType::class, [
                'label' => 'Photo de profil',
                'required' => false,
            ])
            ->add('roles', ChoiceType::class, [
                'label' => 'Rôles',
                'choices' => [
                    'Membre' => 'ROLE_USER',
                    'Administrateur' => 'ROLE_ADMIN',
                ],
            ])
            ->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) {
                // User
                $user = $event->getData();
                // Form
                $form = $event->getForm();

                // Add or Edit ?
                // A new user doesn't have an ID
                if ($user->getId() === null) {
                    // Add (new)
                    $form->add('password', PasswordType::class, [
                        'label' => 'Mot de passe',
                        'constraints' => [
                            new NotBlank(),
                            new Regex("/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*['_', '-', '|', '%', '&', '*', '=', '@', '$']).{8,}$/")
                        ],
                        'help' => 'Au moins 8 caractères,
                            au moins une minuscule
                            au moins une majuscule
                            au moins un chiffre
                            au moins un caractère spécial parmi _, -, |, %, &, *, =, @, $'
                    ]);
                } else {
                    // Edit
                    $form->add('password', PasswordType::class, [
                        // For the edit
                        'empty_data' => '',
                        'attr' => [
                            'placeholder' => 'Laissez vide si inchangé'
                        ],
                        // This field will not automaticaly mapped on the entity
                        // The $user's propety $password will not modify by the form's processing
                        'mapped' => false,
                        'required' => false,
                    ]);
                }
            });
            $builder->get('roles')
            ->addModelTransformer(new CallbackTransformer(
                // De l'Entité vers le Form (affiche form)
                function ($rolesAsArray) {
                    // transform the array to a string
                    return implode(', ', $rolesAsArray);
                },
                // Du Form vers l'Entité (traite form)
                function ($rolesAsString) {
                    // transform the string back to an array
                    return explode(', ', $rolesAsString);
                }
            ));
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
