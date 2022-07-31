<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="front_home")
     */
    public function home(): Response
    {
        return $this->render('front/main/index.html.twig', [
            
        ]);
    }


    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('front/main/index.html.twig', [

        ]);
    }

    /**
     * @Route("/mentions-legales", name="legales-mentions")
     */
    public function legaleMentions(): Response
    {
        return $this->render('front/main/index.html.twig', [

        ]);
    }

    /**
     * @Route("/pla-du-site", name="site-plan")
     */
    public function sitePlan(): Response
    {
        return $this->render('front/main/index.html.twig', [

        ]);
    }
}
