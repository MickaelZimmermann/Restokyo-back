<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @Route("/commentaires/liste", name="comments_list")
     */
    public function list(): Response
    {
        return $this->render('front/comment/index.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }

    /**
     * @Route("etablissements/{slug}/commentaires/ajouter", name="comments_add")
     */
    public function add(): Response
    {
        return $this->render('front/comment/index.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }
}
