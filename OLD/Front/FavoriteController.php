<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FavoriteController extends AbstractController
{

    // Two different methods that will be merged into one


    /**
     * @Route("/ma-liste", name="fav_list")
     */
    public function list(): Response
    {
        return $this->render('front/favorite/index.html.twig', [
            'controller_name' => 'FavoriteController',
        ]);
    }

    /**
     * @Route("/ma-liste/ajouter", name="fav_list_add")
     */
    public function add(): Response
    {
        return $this->render('front/favorite/index.html.twig', [
            'controller_name' => 'FavoriteController',
        ]);
    }
}
