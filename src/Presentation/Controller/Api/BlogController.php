<?php

namespace App\Presentation\Controller\Api;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class BlogController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/list", name="blog_list")
     */
    public function list()
    {
        
    }

}
