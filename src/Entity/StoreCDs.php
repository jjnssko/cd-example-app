<?php

namespace App\Entity;

use App\Repository\StoreCDsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StoreCDsRepository::class)]
class StoreCDs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(length: 255)]
    private ?string $Artist = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Album = null;

    #[ORM\Column(length: 255)]
    private ?string $Genre = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $ReleaseYear = null;

    #[ORM\Column]
    private ?float $Price = null;

    #[ORM\Column]
    private ?float $Rating = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getArtist(): ?string
    {
        return $this->Artist;
    }

    public function setArtist(string $Artist): self
    {
        $this->Artist = $Artist;

        return $this;
    }

    public function getAlbum(): ?string
    {
        return $this->Album;
    }

    public function setAlbum(?string $Album): self
    {
        $this->Album = $Album;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->Genre;
    }

    public function setGenre(string $Genre): self
    {
        $this->Genre = $Genre;

        return $this;
    }

    public function getReleaseYear(): ?\DateTimeInterface
    {
        return $this->ReleaseYear;
    }

    public function setReleaseYear(\DateTimeInterface $ReleaseYear): self
    {
        $this->ReleaseYear = $ReleaseYear;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->Rating;
    }

    public function setRating(float $Rating): self
    {
        $this->Rating = $Rating;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(?string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }
}
