<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//Import de notre formulaire
use App\Form\ArticleType;
//Import de notre entité
use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;


final class ArticleController extends AbstractController
{

    #[Route('/edit-article/', name: 'app_edit_article')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
       
        //1. On prépare un objet vide (cible du form)
        $article = new article();
        $article->settitle('Maitriser Symfony');
        $article->setcontent(content: 'test');
        $article->setuser_id('1');
        $article->setDate(new \DateTimeImmutable('tomorrow'));

        //2. Crée le form via la formbuilder et la classe préparée
        $form = $this->createForm(ArticleType::class, $article);

        //Est-ce qu'on est en train de traiter le form ?
        //Set le champ isSubmitted pour nous
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            //Traitement du formulaire
            $article = $form->getData();
            //La j'ai un objet correct, je peux le persister
            $em->persist($article);
            $em->flush();
        }


        //3.On passe le form à la vue
        return $this->render('article/index.html.twig', [
            'form' => $form
        ]);
       
    }
}
