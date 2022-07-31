<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\Establishment;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Manage user favorites (movies and series) in session
 */
class FavoritesManager
{
    // private $currentUser;

    // public function __construct(Security $security)
    // {
    //     $this->currentUser = $security->getUser();

    // }

    // /**
    //  * Add or remove movie in favorites list
    //  * 
    //  * @param Movie $movie
    //  * 
    //  * @return bool true if added, false if removed
    //  */
    // public function toggle(Movie $movie): bool
    // {
    //     $favorites = $this->session->get('favorites');

    //     if ($favorites != null) {

    //         if (array_key_exists($movie->getId(), $favorites)) {

    //             unset($favorites[$movie->getId()]);

    //             $this->session->set('favorites', $favorites);

    //             return false;
    //         }
    //     }

    //     $favorites[$movie->getId()] = $movie;

    //     $this->session->set('favorites', $favorites);
    //     return true;
    // }
}
