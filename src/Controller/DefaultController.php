<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ToDo;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {   
        $todos = [
            'Wash my cat',
            'Clean teeth'
        ];

        $todos = $this->getDoctrine()->getRepository
        (ToDo::class)->findAll();
        
        return $this->render('todotemplates/hello_page.html.twig',[
            'todos' => $todos
            ]);
    }

    public function login()
    {
        return $this->render('todotemplates/login_page.html.twig');
    }
}
