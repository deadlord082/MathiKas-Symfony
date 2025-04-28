<?php
// src/Entity/Article.php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[ORM\Table(name: '`article`')]
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

    #[ORM\ManyToOne(inversedBy: "articles", fetch: "EAGER")]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $author = null;

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


    public function getdate(): string
    {
        return $this->date;
    }

    public function setdate(?string $date): void
    {
        $this->date = $date;
    }

    public function getAuthor(): ?User
    {
      return $this->author;
    }
  
    public function setAuthor(?User $author): static
    {
      $this->author = $author;
  
      return $this;
    }
}