<?php

namespace App\Entity;

use App\Repository\IpLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IpLogRepository::class)]
class IpLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ipv4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ipv6 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $location = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $loggedAt = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $data = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIpv4(): ?string
    {
        return $this->ipv4;
    }

    public function setIpv4(string $ipv4): static
    {
        $this->ipv4 = $ipv4;

        return $this;
    }

    public function getIpv6(): ?string
    {
        return $this->ipv6;
    }

    public function setIpv6(?string $ipv6): static
    {
        $this->ipv6 = $ipv6;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getLoggedAt(): ?\DateTimeImmutable
    {
        return $this->loggedAt;
    }

    public function setLoggedAt(\DateTimeImmutable $loggedAt): static
    {
        $this->loggedAt = $loggedAt;

        return $this;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(?string $data): static
    {
        $this->data = $data;

        return $this;
    }
}
