<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/admin/blog", name="admin_blog")
     */
    public function index()
    {
        return $this->render('admin/blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
}
