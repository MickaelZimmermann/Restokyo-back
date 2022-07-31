<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DistrictController extends AbstractController
{
    /**
     * @Route("/quartier/{slug}", name="district_show")
     */
    public function list(): Response
    {
        return $this->render('front/district/index.html.twig', [
            'controller_name' => 'DistrictController',
        ]);
    }
}
