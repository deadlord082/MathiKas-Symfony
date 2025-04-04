<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//Import de notre formulaire
use App\Form\TaskType;
//Import de notre entité
use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;


final class TaskController extends AbstractController
{

    #[Route('/edit-task/', name: 'app_edit_task')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
       
        //1. On prépare un objet vide (cible du form)
        $task = new Task();
        //Valeur par défaut
        $task->setTask('Maitriser Symfony');
        $task->setDueDate(new \DateTimeImmutable('tomorrow'));

        //2. Crée le form via la formbuilder et la classe préparée
        $form = $this->createForm(TaskType::class, $task);

        //Est-ce qu'on est en train de traiter le form ?
        //Set le champ isSubmitted pour nous
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            //Traitement du formulaire
            $task = $form->getData();
            //La j'ai un objet correct, je peux le persister
            // $em->persist($task);
            // $em->flush();
        }


        //3.On passe le form à la vue
        return $this->render('task/index.html.twig', [
            'form' => $form
        ]);
       
    }
}
