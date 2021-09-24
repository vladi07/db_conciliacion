<?php

namespace App\Entity;

use App\Repository\GeneroRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GeneroRepository::class)
 */
class Genero
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $masculino;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $femenino;

    /**
     * @ORM\ManyToOne(targetEntity=Reporte::class, inversedBy="genero")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reporte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMasculino(): ?string
    {
        return $this->masculino;
    }

    public function setMasculino(?string $masculino): self
    {
        $this->masculino = $masculino;

        return $this;
    }

    public function getFemenino(): ?string
    {
        return $this->femenino;
    }

    public function setFemenino(?string $femenino): self
    {
        $this->femenino = $femenino;

        return $this;
    }

    public function getReporte(): ?Reporte
    {
        return $this->reporte;
    }

    public function setReporte(?Reporte $reporte): self
    {
        $this->reporte = $reporte;

        return $this;
    }
}
