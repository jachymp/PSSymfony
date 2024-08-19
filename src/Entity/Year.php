<?php

namespace App\Entity;

use App\Repository\YearRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: YearRepository::class)]
class Year
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $name = null;

    #[ORM\Column(length: 10)]
    private ?string $grade = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $start = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $end = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $fest_description1 = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $fest_description2 = null;

    #[ORM\Column(nullable: true)]
    private ?int $fest_price_friday = null;

    #[ORM\Column(nullable: true)]
    private ?int $fest_price_saturday = null;

    #[ORM\Column(nullable: true)]
    private ?int $fest_price_all = null;

    #[ORM\Column(nullable: true)]
    private ?int $fest_price_friday_student = null;

    #[ORM\Column(nullable: true)]
    private ?int $fest_price_saturday_student = null;

    #[ORM\Column(nullable: true)]
    private ?int $fest_price_all_student = null;

    #[ORM\Column]
    private ?bool $lineup_public = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $accomodation_link = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ticket_link = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $updated_at = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $spotify_link = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?int
    {
        return $this->name;
    }

    public function setName(int $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): static
    {
        $this->grade = $grade;

        return $this;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(\DateTimeInterface $start): static
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(\DateTimeInterface $end): static
    {
        $this->end = $end;

        return $this;
    }

    public function getFestDescription1(): ?string
    {
        return $this->fest_description1;
    }

    public function setFestDescription1(?string $fest_description1): static
    {
        $this->fest_description1 = $fest_description1;

        return $this;
    }

    public function getFestDescription2(): ?string
    {
        return $this->fest_description2;
    }

    public function setFestDescription2(string $fest_description2): static
    {
        $this->fest_description2 = $fest_description2;

        return $this;
    }

    public function getFestPriceFriday(): ?int
    {
        return $this->fest_price_friday;
    }

    public function setFestPriceFriday(?int $fest_price_friday): static
    {
        $this->fest_price_friday = $fest_price_friday;

        return $this;
    }

    public function getFestPriceSaturday(): ?int
    {
        return $this->fest_price_saturday;
    }

    public function setFestPriceSaturday(?int $fest_price_saturday): static
    {
        $this->fest_price_saturday = $fest_price_saturday;

        return $this;
    }

    public function getFestPriceAll(): ?int
    {
        return $this->fest_price_all;
    }

    public function setFestPriceAll(?int $fest_price_all): static
    {
        $this->fest_price_all = $fest_price_all;

        return $this;
    }

    public function getFestPriceFridayStudent(): ?int
    {
        return $this->fest_price_friday_student;
    }

    public function setFestPriceFridayStudent(?int $fest_price_friday_student): static
    {
        $this->fest_price_friday_student = $fest_price_friday_student;

        return $this;
    }

    public function getFestPriceSaturdayStudent(): ?int
    {
        return $this->fest_price_saturday_student;
    }

    public function setFestPriceSaturdayStudent(?int $fest_price_saturday_student): static
    {
        $this->fest_price_saturday_student = $fest_price_saturday_student;

        return $this;
    }

    public function getFestPriceAllStudent(): ?int
    {
        return $this->fest_price_all_student;
    }

    public function setFestPriceAllStudent(?int $fest_price_all_student): static
    {
        $this->fest_price_all_student = $fest_price_all_student;

        return $this;
    }

    public function isLineupPublic(): ?bool
    {
        return $this->lineup_public;
    }

    public function setLineupPublic(bool $lineup_public): static
    {
        $this->lineup_public = $lineup_public;

        return $this;
    }

    public function getAccomodationLink(): ?string
    {
        return $this->accomodation_link;
    }

    public function setAccomodationLink(?string $accomodation_link): static
    {
        $this->accomodation_link = $accomodation_link;

        return $this;
    }

    public function getTicketLink(): ?string
    {
        return $this->ticket_link;
    }

    public function setTicketLink(?string $ticket_link): static
    {
        $this->ticket_link = $ticket_link;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getSpotifyLink(): ?string
    {
        return $this->spotify_link;
    }

    public function setSpotifyLink(?string $spotify_link): static
    {
        $this->spotify_link = $spotify_link;

        return $this;
    }
}
