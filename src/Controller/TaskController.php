<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//Import de notre formulaire
use App\Form\TaskType;
//Import de notre entité
use App\Entity\Task;

final class TaskController extends AbstractController
{
    public function new(Request $request): Response
    {

        $task = new Task();
        // $task->setTask('Write a blog post');
        // $task->setDueDate(new \DateTimeImmutable('tomorrow'));
        $form = $this->createForm(TaskType::class, $task);
       
    }
}
