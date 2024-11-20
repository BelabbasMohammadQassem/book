<?php
namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $publicationYear = null;

    #[ORM\Column(length: 20)]
    private ?string $isbn = null;

    #[ORM\ManyToMany(targetEntity: Author::class, inversedBy: 'books')]
    private Collection $book;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'books')]
    private Collection $classify;

    public function __construct()
    {
        $this->book = new ArrayCollection();
        $this->classify = new ArrayCollection();
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getPublicationYear(): ?int
    {
        return $this->publicationYear;
    }

    public function setPublicationYear(int $publicationYear): static
    {
        $this->publicationYear = $publicationYear;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): static
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * @return Collection<int, Author>
     */
    public function getBook(): Collection
    {
        return $this->book;
    }

    public function addBook(Author $book): static
    {
        if (!$this->book->contains($book)) {
            $this->book->add($book);
        }

        return $this;
    }

    public function removeBook(Author $book): static
    {
        $this->book->removeElement($book);

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getClassify(): Collection
    {
        return $this->classify;
    }

    public function addClassify(Category $classify): static
    {
        if (!$this->classify->contains($classify)) {
            $this->classify->add($classify);
        }

        return $this;
    }

    public function removeClassify(Category $classify): static
    {
        $this->classify->removeElement($classify);

        return $this;
    }

   
}