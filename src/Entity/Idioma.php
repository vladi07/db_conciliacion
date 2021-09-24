<?php

namespace App\Entity;

use App\Repository\IdiomaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IdiomaRepository::class)
 */
class Idioma
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
    private $castellano;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $aymara;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $quechua;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $otro;

    /**
     * @ORM\ManyToOne(targetEntity=Reporte::class, inversedBy="idioma")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reporte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCastellano(): ?string
    {
        return $this->castellano;
    }

    public function setCastellano(?string $castellano): self
    {
        $this->castellano = $castellano;

        return $this;
    }

    public function getAymara(): ?string
    {
        return $this->aymara;
    }

    public function setAymara(?string $aymara): self
    {
        $this->aymara = $aymara;

        return $this;
    }

    public function getQuechua(): ?string
    {
        return $this->quechua;
    }

    public function setQuechua(?string $quechua): self
    {
        $this->quechua = $quechua;

        return $this;
    }

    public function getOtro(): ?string
    {
        return $this->otro;
    }

    public function setOtro(?string $otro): self
    {
        $this->otro = $otro;

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
