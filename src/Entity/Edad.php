<?php

namespace App\Entity;

use App\Repository\EdadRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EdadRepository::class)
 */
class Edad
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
    private $menor;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $joven;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $adulto;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $jovenAdulto;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $mayor;

    /**
     * @ORM\ManyToOne(targetEntity=Reporte::class, inversedBy="edad")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reporte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMenor(): ?string
    {
        return $this->menor;
    }

    public function setMenor(?string $menor): self
    {
        $this->menor = $menor;

        return $this;
    }

    public function getJoven(): ?string
    {
        return $this->joven;
    }

    public function setJoven(?string $joven): self
    {
        $this->joven = $joven;

        return $this;
    }

    public function getAdulto(): ?string
    {
        return $this->adulto;
    }

    public function setAdulto(?string $adulto): self
    {
        $this->adulto = $adulto;

        return $this;
    }

    public function getJovenAdulto(): ?string
    {
        return $this->jovenAdulto;
    }

    public function setJovenAdulto(?string $jovenAdulto): self
    {
        $this->jovenAdulto = $jovenAdulto;

        return $this;
    }

    public function getMayor(): ?string
    {
        return $this->mayor;
    }

    public function setMayor(?string $mayor): self
    {
        $this->mayor = $mayor;

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
