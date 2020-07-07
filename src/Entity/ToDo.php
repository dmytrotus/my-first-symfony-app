<?php

namespace App\Entity;

use App\Repository\ToDoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ToDoRepository::class)
 */
class ToDo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="text", length=256)
     */
    private $content;

    /**
     * @ORM\Column(type="integer")
     */
    private $is_done;


    //Getters and Setters

    public function getContent(){
        return $this->content;
    }
    public function setContent($content){
        $this->content = $content;
    }

    public function getIs_Done(){
        return $this->is_done;
    }
    public function setIs_Done($isDone){
        $this->is_done = $isDone;
    }
}
