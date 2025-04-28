<?php
// src/Entity/Booking.php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\BookingRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: BookingRepository::class)]
#[ORM\Table(name: '`booking`')]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: "bookings", fetch: "EAGER")]
    #[ORM\JoinColumn(nullable: false)]
    private ?Book $book = null;

    #[ORM\ManyToOne(inversedBy: "bookings", fetch: "EAGER")]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column]
    protected ?\DateTimeImmutable $date;

    public function getdate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setdate(?\DateTimeImmutable $date): void
    {
        $this->date = $date;
    }

    public function getUser(): ?User
    {
      return $this->user;
    }
  
    public function setUser(?User $user): static
    {
      $this->user = $user;
  
      return $this;
    }

    public function getBook(): ?Book
    {
      return $this->book;
    }
  
    public function setBook(?Book $book): static
    {
      $this->book = $book;
  
      return $this;
    }
}
