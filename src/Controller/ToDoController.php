<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ToDo;
use Symfony\Component\HttpFoundation\Request;

class ToDoController extends AbstractController
{
	/**
    * @Route("/ToDoIndex", name="default")
    */
    public function index()
    {   
        $todos = [
            'Wash my cat',
            'Clean teeth'
        ];

        $todos = $this->getDoctrine()->getRepository
        (ToDo::class)->findAll();
        
        return $this->render('todotemplates/todoindex_page.html.twig',[
            'todos' => $todos
            ]);
    }

    /**
    * @Route("/todo/save")
    */

    public function saveToDo(Request $request){
        $entityManager = $this->getDoctrine()->getManager();

        $content = $request->request->all()['task'];
        $is_done = 0;

        $todo = new Todo();
        $todo->setContent($content);
        $todo->setIs_Done($is_done);///make it nullable

        $entityManager->persist($todo);
        $entityManager->flush();

        return $this->redirect($request->headers->get('referer'));
    }

    /**
    * @Route("/todo/delete")
    */

    public function deleteToDo(Request $request){
        $id = $request->request->all()['todoId'];

        $repository = $this->getDoctrine()->getRepository(ToDo::class);
        $todo = $repository->find($id);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($todo);
        $entityManager->flush();

        return $this->redirect($request->headers->get('referer'));

    }

    public function changeIsDoneToDo(Request $request){
        $id = $request->request->all()['todoId'];
        $is_done = $request->request->all()['isDone'];
        $entityManager = $this->getDoctrine()->getManager();

        $repository = $this->getDoctrine()->getRepository(ToDo::class);
        $todo = $repository->find($id);
        $todo->setIs_Done($is_done);
        $entityManager->persist($todo);
        $entityManager->flush();

        return $this->redirect($request->headers->get('referer'));
    }
}
