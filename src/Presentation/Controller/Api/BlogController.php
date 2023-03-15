<?php

namespace App\Presentation\Controller\Api;

use App\Domain\Model\Post;
use App\Presentation\Form\PostFormType;
use App\Infrastructure\Persistence\Service\PersisterMockInterface;
use App\Application\Service\RequestDataInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use OpenApi\Annotations as OA;
use Nelmio\ApiDocBundle\Annotation\Model;

class BlogController extends AbstractFOSRestController
{
    /**
     * List all Blog Posts.
     * @Rest\Get("/list", name="blog_list")
     * @OA\Response(
     *      response=200,
     *      description="List all Blog Posts.",
     *      @Model(type=PostDto::class)
     * )
     */
    public function list(RequestDataInterface $requestData): View
    {
        $posts = $requestData->fetchPosts();
        $view = View::create();
        $view->setData($posts);

        return $view;
    }

    /**
     * Get a single Blog Post
     * @Rest\Get("/item/{id}", name="fetch_item")
     * @OA\Response(
     *      response=200,
     *      description="Get a single Blog Post",
     *      @Model(type=PostDto::class)
     * )
     * @throws BadRequestHttpException
     */
    public function fetchItem(int $id, RequestDataInterface $requestData): View
    {
        try {
            $post = $requestData->fetchPost($id);
        } catch (\Exception $e) {
            return View::create($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        $view = View::create();
        $view->setData($post);

        return $view;
    }

    /**
     * Get a single user.
     * @Rest\Get("/user/{id}", name="get_user")
     * @OA\Response(
     *      response=200,
     *      description="Get a single user.",
     *      @Model(type=User::class)
     * )
     */
    public function fetchUser(int $id, RequestDataInterface $requestData, Request $request): View
    {
        try {
            $user = $requestData->fetchUser($id);
        } catch (\Exception $e) {
            return View::create($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
        
        $view = View::create();
        $view->setData($user);

        return $view;
    }

    /**
     * Post a new blog Post item.
     * @Rest\Post("/item", name="post_item")
     * @OA\Post(
     *      @OA\RequestBody(
     *          @OA\Schema(type="array",
     *          @OA\Property(
     *              property="post_form", ref=@Model(type=PostFormType::class))
     *          )
     *      )
     * )
     */
    public function postItem(
        Request $request,
        PersisterMockInterface $persisterMock
    ): View
    {
        $post = new Post();
        $form = $this->createForm(PostFormType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if (!$form->isValid()) {
                return View::create($form, Response::HTTP_BAD_REQUEST);
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
                ->setStatusCode(Response::HTTP_BAD_REQUEST)
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
