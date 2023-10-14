<?php

namespace App\Entity;

use App\Repository\PicturesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PicturesRepository::class)]
class Pictures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $url = null;

    #[ORM\Column(nullable: true)]
    private ?string $label = null;

    #[ORM\Column(length: 2000, nullable: true)]
    private ?string $urlWeb = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;
        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;
        return $this;
    }

    public function getUrlWeb(): ?string
    {
        return $this->urlWeb;
    }

    public function setUrlWeb(?string $urlWeb): static
    {
        $this->urlWeb = $urlWeb;

        return $this;
    }
}
