<?php

namespace App\Presentation\Controller\Front;

use App\Domain\Model\Post;
use App\Presentation\Form\PostFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WebController extends AbstractController
{
    private const POSTAPI = '/api/item';

    /**
     * @Route("/", name="app_web")
     */
    public function index(): Response
    {
        $post = new Post();
        $form = $this
            ->createForm(PostFormType::class, $post, [
                'action' => self::POSTAPI,
                'method' => 'POST',
            ]);

        return $this->render('web/index.html.twig', [
            'controller_name' => 'WebController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/viewPost/{id}", name="app_view_post")
     */
    public function postDetail(int $id): Response
    {
        return $this->render('web/viewPost.html.twig', [
            'controller_name' => 'WebController',
            'id' => $id,
        ]);
    }
}
