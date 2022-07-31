<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EstablishmentController extends AbstractController
{
    /**
     * @Route("/etablissements/{type}/liste", name="establishment_list")
     */
    public function list(): Response
    {
        return $this->render('front/establishment/index.html.twig', [
            'controller_name' => 'EstablishmentController',
        ]);
    }

    /**
     * @Route("/etablissements/{type}/{slug}", name="establishment_show")
     */
    public function show(): Response
    {
        return $this->render('front/establishment/index.html.twig', [
            'controller_name' => 'EstablishmentController',
        ]);
    }

    /**
     * @Route("/etablissements/populaires/liste", name="establishment_topList")
     */
    public function popularList(): Response
    {
        return $this->render('front/establishment/index.html.twig', [
            'controller_name' => 'EstablishmentController',
        ]);
    }

    /**
     * @Route("/etablissements/ajouter", name="establishment_add")
     */
    public function add(): Response
    {
        return $this->render('front/establishment/index.html.twig', [
            'controller_name' => 'EstablishmentController',
        ]);
    }
}
