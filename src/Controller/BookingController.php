<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//Import de notre entité
use App\Entity\Booking;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;


final class BookingController extends AbstractController
{
    #[Route('/bookings/', name: 'app_bookings')]
    public function all(Request $request, EntityManagerInterface $em): Response
    { 
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        $bookings = $em->getRepository(Booking::class)->findAll(['user_id' => $user->id]);

        return $this->render('booking/bookings.html.twig', [
            'bookings' => $bookings
        ]);   
    }

    #[Route("/bookings/{id}", name: "app_show_booking", requirements: ["id" => "\d+"])]
    public function show(EntityManagerInterface $em, int $id): Response
    { 
        $booking = $em->getRepository(Booking::class)->find($id);

        return $this->render('booking/show.html.twig', [
            'booking' => $booking
        ]);   
    }
}
