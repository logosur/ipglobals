<?php

namespace App\Presentation\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WebController extends AbstractController
{
    /**
     * @Route("/", name="app_web")
     */
    public function index(): Response
    {

        return $this->render('web/index.html.twig', [
            'controller_name' => 'WebController',
        ]);
    }
}
