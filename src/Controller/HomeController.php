<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', []);
    }

    //Cette ressource ne doit être accessible qu'aux users auth.
    //Méthode 1 : access_control
    #[Route('/private', name: 'app_private')]
    public function private(): Response
    {
        return $this->render('home/private.html.twig', []);
    }

    //Cette ressource ne doit être accessible qu'aux users auth.
    //Methode 2 a) : instruction
    #[Route('/private2', name: 'app_private2')]
    public function private2(): Response
    {
        //Méthode fournie par AbstractController
        //Throws AccessDenyException
        $this->denyAccessUnlessGranted('ROLE_USER');

        return $this->render('home/private.html.twig', []);
    }

    //Cette ressource ne doit être accessible qu'aux users auth.
    //Methode 2 b) : via un attribut PHP
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/private3', name: 'app_private3')]
    public function private3(): Response
    {
        return $this->render('home/private.html.twig', []);
    }


}
