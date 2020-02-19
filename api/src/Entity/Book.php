<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 */
class Book
{
    /**
     * @var int The entity Id
     *
     * @Groups({"book:read"})
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string Book isbn
     *
     * @Groups({"group:read", "group:write"})
     *
     * @ORM\Column(type="string")
     */
    public $isbn = '';

    /**
     * @var string Book title
     *
     * @Groups({"group:read", "group:write", "group:list"})
     *
     * @ORM\Column(type="string")
     */
    public $title = '';

    /**
     * @var string Book abstract
     *
     * @Groups({"group:read", "group:write"})
     *
     * @ORM\Column(type="string")
     */
    public $abstract = '';

    /**
     * @var string Book description
     *
     * @Groups({"group:read", "group:write"})
     *
     * @ORM\Column(type="text")
     */
    public $description = '';

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Author", inversedBy="books")
     */
    private $author;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Review", mappedBy="book")
     */
    private $reviews;

    /**
     * @var string Book publication date
     *
     * @Groups({"group:read", "group:write", "group:list"})
     *
     * @ORM\Column(type="datetime")
     */
    public $publicationDate;

    /**
     * Book constructor.
     */
    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }


    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getIsbn(): string
    {
        return $this->isbn;
    }

    /**
     * @param string $isbn
     */
    public function setIsbn(string $isbn): void
    {
        $this->isbn = $isbn;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAbstract(): string
    {
        return $this->abstract;
    }

    /**
     * @param string $abstract
     */
    public function setAbstract(string $abstract): void
    {
        $this->abstract = $abstract;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(Author $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getPublicationDate(): \DateTime
    {
        return $this->publicationDate;
    }

    /**
     * @param string $publicationDate
     */
    public function setPublicationDate(\DateTime $publicationDate): void
    {
        $this->publicationDate = $publicationDate;
    }


}
