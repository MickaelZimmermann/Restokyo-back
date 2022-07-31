<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FoodController extends AbstractController
{
    /**
     * @Route("/nourriture/{slug}", name="food_list")
     */
    public function list(): Response
    {
        return $this->render('front/food/index.html.twig', [
            'controller_name' => 'FoodController',
        ]);
    }


}
