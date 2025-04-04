<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//Import de notre formulaire
use App\Form\TaskType;
//Import de notre entité
use App\Entity\Task;
use Symfony\Component\Routing\Route;

final class TaskController extends AbstractController
{

    #[Route('/edit-task', name: 'app_edit_task')]
    public function new(Request $request): Response
    {
        //1. On prépare un objet vide (cible du form)
        $task = new Task();
        //2. Crée le form via la formbuilder et la classe préparée
        $form = $this->createForm(TaskType::class, $task);
        //3.On passe le form à la vue
        return $this->render('task/index.html.twig', [
            'form' => $form
        ]);
       
    }
}
