<?php

namespace App\Presentation\Controller\Api;

use App\Domain\Model\Post;
use App\Presentation\Form\PostFormType;
use App\Infrastructure\Persistence\Service\PersisterMockInterface;
use App\Presentation\Service\RequestDataInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class BlogController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/list", name="blog_list")
     */
    public function list(RequestDataInterface $requestData)
    {
        $posts = $requestData->fetchPosts();
        $view = View::create();
        $view->setData($posts);

        return $view;
    }

    /**
     * @Rest\Get("/item/{id}", name="fetch_item")
     */
    public function fetchItem(int $id, RequestDataInterface $requestData)
    {
        $post = $requestData->fetchPost($id);
        $view = View::create();
        $view->setData($post);

        return $view;
    }

    /**
     * @Rest\Get("/user/{id}", name="get_user")
     */
    public function fetchUser(int $id, RequestDataInterface $requestData, Request $request)
    {
        //$id = $request->get('id');
        $user = $requestData->fetchUser($id);
        $view = View::create();
        $view->setData($user);

        return $view;
    }

    /**
     * @Rest\Post("/item", name="post_item")
     */
    public function postItem(
        RequestDataInterface $requestData,
        ValidatorInterface $validator,
        FormFactoryInterface $formFactory,
        Request $request,
        PersisterMockInterface $persisterMock
    ) {
        $post = new Post();
        $form = $this->createForm(PostFormType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if (!$form->isValid()) {
                return View::create($form);
            } else {
                $post = $form->getData();
                $persisterMock->persist($post);

                return View::create([
                    'result' => 'Post sent!',
                ]);
            }
        } else {
            $view = View::create();
            $view
                ->setStatusCode(400)
                ->setData([
                    'message' => 'Unexpected error.',
                    'errors' => [
                        'children' => [],
                    ],
                ]);

            return $view;
        }
    }
}
