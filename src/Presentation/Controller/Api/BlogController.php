<?php

namespace App\Presentation\Controller\Api;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class BlogController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/list", name="blog_list")
     */
    public function list()
    {
    }
}
