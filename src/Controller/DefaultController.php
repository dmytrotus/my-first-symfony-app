<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    public function index(){

        return $this->render('index_page.html.twig');
    }
    public function login()
    {
        return $this->render('todotemplates/login_page.html.twig');
    }
}
