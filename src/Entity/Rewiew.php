<?php
// src/Entity/Rewiew.php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Rewiew
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
    #[ORM\Column]
    protected string $comment = null;

    #[Assert\NotBlank]
    #[ORM\Column]
    protected ?int $star = null;


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

    public function getcomment(): string
    {
        return $this->comment;
    }

    public function setcomment(string $comment): void
    {
        $this->comment = $comment;
    }

    public function getstar(): string
    {
        return $this->star;
    }

    public function setstar(?int $star): void
    {
        $this->star = $star;
    }
}
