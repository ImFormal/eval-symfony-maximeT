<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: "Le titre ne peut pas être vide.")]
    #[Assert\Length(min:3, minMessage:"Le titre doit être supérieur à 2 caractères")]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: "Le contenu ne peut pas être vide.")]
    private ?string $content = null;

    #[ORM\Column(nullable:true, type:'datetime')]
    private $createdAt = null;

    #[ORM\Column(nullable:true, type:'datetime')]
    private $expiredAt = null;

    #[ORM\Column(nullable: true)]
    private ?bool $status = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getExpiredAt(): DateTime
    {
        return $this->expiredAt;
    }

    public function setExpiredAt(DateTime $expiredAt): static
    {
        $this->expiredAt = $expiredAt;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): static
    {
        $this->status = $status;

        return $this;
    }
}
