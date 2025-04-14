<?php
// src/Entity/Booking.php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank]
    #[ORM\Column]
    protected ?int $book_id = null;

    #[Assert\NotBlank]
    #[ORM\Column]
    protected ?int $user_id = null;

    #[Assert\NotBlank]
    #[Assert\Type(\DateTimeInterface::class)]
    protected ?\DateTimeInterface $date;

    public function getbook_id(): string
    {
        return $this->book_id;
    }

    public function setbook_id(?int $book_id): void
    {
        $this->book_id = $book_id;
    }

    public function getuser_id(): string
    {
        return $this->user_id;
    }

    public function setuser_id(?int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getdate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setdate(?\DateTimeInterface $date): void
    {
        $this->date = $date;
    }
}
