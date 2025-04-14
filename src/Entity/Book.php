<?php
// src/Entity/Book.php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank]
    #[ORM\Column]
    protected string $isbn = null;

    #[Assert\NotBlank]
    #[ORM\Column]
    protected string $title = null;

    #[Assert\NotBlank]
    #[ORM\Column]
    protected string $resume = null;

    #[Assert\NotBlank]
    #[Assert\Type(\DateTimeInterface::class)]
    protected ?\DateTimeInterface $date;

    public function getisbn(): string
    {
        return $this->isbn;
    }

    public function setisbn(string $isbn): void
    {
        $this->isbn = $isbn;
    }

    public function gettitle(): string
    {
        return $this->title;
    }

    public function settitle(string $title): void
    {
        $this->title = $title;
    }

    public function getresume(): string
    {
        return $this->resume;
    }

    public function setresume(string $resume): void
    {
        $this->resume = $resume;
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
