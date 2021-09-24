<?php

namespace App\Entity;

use App\Repository\SolicitanteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SolicitanteRepository::class)
 */
class Solicitante
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
    private $pNatural;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $pJuridica;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $pRepresentante;

    /**
     * @ORM\ManyToOne(targetEntity=Reporte::class, inversedBy="solicitante")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reporte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPNatural(): ?string
    {
        return $this->pNatural;
    }

    public function setPNatural(?string $pNatural): self
    {
        $this->pNatural = $pNatural;

        return $this;
    }

    public function getPJuridica(): ?string
    {
        return $this->pJuridica;
    }

    public function setPJuridica(?string $pJuridica): self
    {
        $this->pJuridica = $pJuridica;

        return $this;
    }

    public function getPRepresentante(): ?string
    {
        return $this->pRepresentante;
    }

    public function setPRepresentante(?string $pRepresentante): self
    {
        $this->pRepresentante = $pRepresentante;

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
