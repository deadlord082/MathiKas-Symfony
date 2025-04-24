<?php
// src/Entity/Article.php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank]
    #[ORM\Column]
    protected ?string $title = null;

    #[Assert\NotBlank]
    #[ORM\Column]
    protected ?string $content = null;

    #[Assert\NotBlank]
    #[ORM\Column]
    protected ?string $userid = null;

    #[Assert\NotBlank]
    #[Assert\Type(\DateTimeInterface::class)]
    protected ?\DateTimeInterface $date;

    public function gettitle(): string
    {
        return $this->title;
    }

    public function settitle(string $title): void
    {
        $this->title = $title;
    }

    public function getcontent(): string
    {
        return $this->content;
    }

    public function setcontent(string $content): void
    {
        $this->content = $content;
    }

    public function getuser_id(): string
    {
        return $this->user_id;
    }

    public function setuser_id(?string $user_id): void
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
