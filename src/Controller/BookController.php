<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//Import de notre formulaire
use App\Form\BookType;
//Import de notre entité
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;


final class BookController extends AbstractController
{
    #[Route('/books/', name: 'app_books')]
    public function all(Request $request, EntityManagerInterface $em): Response
    { 
        $books = $em->getRepository(Book::class)->findAll();

        return $this->render('book/books.html.twig', [
            'books' => $books
        ]);   
    }

    #[Route("/books/{id}", name: "app_show_book", requirements: ["id" => "\d+"])]
    public function show(EntityManagerInterface $em, int $id): Response
    { 
        $book = $em->getRepository(Book::class)->find($id);

        return $this->render('book/show.html.twig', [
            'book' => $book
        ]);   
    }

    #[Route("/add-book", name: "app_add_book")]
    public function add(Request $request, EntityManagerInterface $em): Response
    {    
        //1. On prépare un objet vide (cible du form)
        $book = new Book();
        $book->settitle('Titre');
        $book->setisbn('ISBN');
        $book->setauthor('Autheur');
        $book->setresume('Resume');
        $book->setdate(new \DateTimeImmutable());

        //2. Crée le form via la formbuilder et la classe préparée
        $form = $this->createForm(BookType::class, $book);

        //Est-ce qu'on est en train de traiter le form ?
        //Set le champ isSubmitted pour nous
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            //Traitement du formulaire
            
            $book = $form->getData();
            //La j'ai un objet correct, je peux le persister
            $em->persist($book);
            $em->flush();
            return $this->redirectToRoute("app_books");
        }

        //3.On passe le form à la vue
        return $this->render('book/add.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/edit-book/{id}', name: 'app_edit_book', requirements: ["id" => "\d+"])]
    public function new(Request $request, EntityManagerInterface $em, int $id): Response
    { 
       
        //1. On prépare un objet vide (cible du form)
        $book = $em->getRepository(Book::class)->find($id);

        //2. Crée le form via la formbuilder et la classe préparée
        $form = $this->createForm(BookType::class, $book);

        //Est-ce qu'on est en train de traiter le form ?
        //Set le champ isSubmitted pour nous
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            //Traitement du formulaire
            $book = $form->getData();
            //La j'ai un objet correct, je peux le persister
            $em->persist($book);
            $em->flush();
            return $this->redirectToRoute("app_books");
        }

        //3.On passe le form à la vue
        return $this->render('book/edit.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/booking-book/{id}', name: 'app_booking_book', requirements: ["id" => "\d+"])]
    public function booking(Request $request, EntityManagerInterface $em, int $id): Response
    { 
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        $booking = new Booking();
        $booking->setbook_id($id);
        $booking->setuser_id($user->id);
        $booking->setdate(new \DateTimeImmutable());

        $em->persist($booking);
        $em->flush();
        return $this->redirectToRoute("app_books");
    }
}
