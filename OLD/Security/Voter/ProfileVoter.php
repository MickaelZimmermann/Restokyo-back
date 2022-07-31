<?php

namespace App\Security\Voter;

use App\Entity\User;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class QuestionVoter extends Voter
{

    public const EDIT = 'PROFILE_EDIT';
    public const VIEW = 'PROFILE_VIEW';
    public const DELETE = 'PROFILE_DELETE';

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports(string $attribute, $subject): bool
    {
        return in_array($attribute, [self::EDIT, self::VIEW, self::DELETE])
            && $subject instanceof \App\Entity\User;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        // Pour avoir l'auto-complétion
        /** @var User $profile */
        $profile = $subject;

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case self::DELETE:

                if ($this->security->isGranted('ROLE_ADMIN')) {
                    return true;
                }

                if ($this->isAuthor($user, $profile)) {
                    return true;
                }

                break;

            case self::EDIT:

                if ($this->isAuthor($user, $profile)) {
                    return true;
                }

                break;

            case self::VIEW:

                if ($this->isAuthor($user, $profile)) {
                    return true;
                }

                break;
        }

        return false;
    }

    /**
     * User is question owner ?
     */
    private function isAuthor($user, $profile)
    {
        return $user === $profile->getUser();
    }
}
