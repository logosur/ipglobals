<?php

namespace App\Presentation\Controller\Api;

use App\Presentation\Service\RequestDataInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;

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
        $user = $requestData->fetchUser($id);
        $view = View::create();
        $view->setData($user);

        return $view;
    }
}
