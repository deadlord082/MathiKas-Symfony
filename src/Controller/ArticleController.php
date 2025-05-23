<?php

namespace App\Controller;

use App\Entity\User;
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
    #[Route('/articles/', name: 'app_articles')]
    public function all(Request $request, EntityManagerInterface $em): Response
    { 
        $articles = $em->getRepository(Article::class)->findAll();

        return $this->render('article/articles.html.twig', [
            'articles' => $articles
        ]);   
    }

    #[Route("/articles/{id}", name: "app_show_article", requirements: ["id" => "\d+"])]
    public function show(EntityManagerInterface $em, int $id): Response
    { 
        $article = $em->getRepository(Article::class)->find($id);

        return $this->render('article/show.html.twig', [
            'article' => $article
        ]);   
    }

    #[Route("/add-article", name: "app_add_article")]
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        // Récupère le user depuis la session
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
    
        //1. On prépare un objet vide (cible du form)
        $article = new article();
        $article->settitle('Titre');
        $article->setcontent('Contenu');
        $article->setAuthor($user);
        $article->setdate(new \DateTimeImmutable());

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
            return $this->redirectToRoute("app_articles");
        }

        //3.On passe le form à la vue
        return $this->render('article/add.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/edit-article/{id}', name: 'app_edit_article', requirements: ["id" => "\d+"])]
    public function new(Request $request, EntityManagerInterface $em, int $id): Response
    { 
       
        //1. On prépare un objet vide (cible du form)
        $article = $em->getRepository(Article::class)->find($id);

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
            return $this->redirectToRoute("app_articles");
        }

        //3.On passe le form à la vue
        return $this->render('article/edit.html.twig', [
            'form' => $form
        ]);
       
    }
}
