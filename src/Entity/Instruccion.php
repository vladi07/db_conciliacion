<?php

namespace App\Entity;

use App\Repository\InstruccionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InstruccionRepository::class)
 */
class Instruccion
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
    private $primaria;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $secundaria;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $tecnico;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $licenciatura;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $postgrado;

    /**
     * @ORM\ManyToOne(targetEntity=Reporte::class, inversedBy="instruccion")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reporte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrimaria(): ?string
    {
        return $this->primaria;
    }

    public function setPrimaria(?string $primaria): self
    {
        $this->primaria = $primaria;

        return $this;
    }

    public function getSecundaria(): ?string
    {
        return $this->secundaria;
    }

    public function setSecundaria(?string $secundaria): self
    {
        $this->secundaria = $secundaria;

        return $this;
    }

    public function getTecnico(): ?string
    {
        return $this->tecnico;
    }

    public function setTecnico(?string $tecnico): self
    {
        $this->tecnico = $tecnico;

        return $this;
    }

    public function getLicenciatura(): ?string
    {
        return $this->licenciatura;
    }

    public function setLicenciatura(?string $licenciatura): self
    {
        $this->licenciatura = $licenciatura;

        return $this;
    }

    public function getPostgrado(): ?string
    {
        return $this->postgrado;
    }

    public function setPostgrado(?string $postgrado): self
    {
        $this->postgrado = $postgrado;

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
