<?php

namespace App\Entity;

use App\Repository\MateriaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MateriaRepository::class)
 */
class Materia
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
    private $civil;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $comercial;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $familiar;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $vecinal;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $comunitario;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $escolar;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $bancario;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $mercantil;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $municipal;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $penal;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $deportivo;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $disciplinario;

    /**
     * @ORM\ManyToOne(targetEntity=Solicitud::class, inversedBy="materia")
     * @ORM\JoinColumn(nullable=false)
     */
    private $solicitud;

    /**
     * @ORM\ManyToOne(targetEntity=ConciSacuerdo::class, inversedBy="materia")
     * @ORM\JoinColumn(nullable=false)
     */
    private $conciSacuerdo;

    /**
     * @ORM\ManyToOne(targetEntity=ConciAcuerdo::class, inversedBy="materia")
     * @ORM\JoinColumn(nullable=false)
     */
    private $conciAcuerdo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCivil(): ?string
    {
        return $this->civil;
    }

    public function setCivil(?string $civil): self
    {
        $this->civil = $civil;

        return $this;
    }

    public function getComercial(): ?string
    {
        return $this->comercial;
    }

    public function setComercial(?string $comercial): self
    {
        $this->comercial = $comercial;

        return $this;
    }

    public function getFamiliar(): ?string
    {
        return $this->familiar;
    }

    public function setFamiliar(?string $familiar): self
    {
        $this->familiar = $familiar;

        return $this;
    }

    public function getVecinal(): ?string
    {
        return $this->vecinal;
    }

    public function setVecinal(?string $vecinal): self
    {
        $this->vecinal = $vecinal;

        return $this;
    }

    public function getComunitario(): ?string
    {
        return $this->comunitario;
    }

    public function setComunitario(?string $comunitario): self
    {
        $this->comunitario = $comunitario;

        return $this;
    }

    public function getEscolar(): ?string
    {
        return $this->escolar;
    }

    public function setEscolar(?string $escolar): self
    {
        $this->escolar = $escolar;

        return $this;
    }

    public function getBancario(): ?string
    {
        return $this->bancario;
    }

    public function setBancario(?string $bancario): self
    {
        $this->bancario = $bancario;

        return $this;
    }

    public function getMercantil(): ?string
    {
        return $this->mercantil;
    }

    public function setMercantil(?string $mercantil): self
    {
        $this->mercantil = $mercantil;

        return $this;
    }

    public function getMunicipal(): ?string
    {
        return $this->municipal;
    }

    public function setMunicipal(?string $municipal): self
    {
        $this->municipal = $municipal;

        return $this;
    }

    public function getPenal(): ?string
    {
        return $this->penal;
    }

    public function setPenal(?string $penal): self
    {
        $this->penal = $penal;

        return $this;
    }

    public function getDeportivo(): ?string
    {
        return $this->deportivo;
    }

    public function setDeportivo(?string $deportivo): self
    {
        $this->deportivo = $deportivo;

        return $this;
    }

    public function getDisciplinario(): ?string
    {
        return $this->disciplinario;
    }

    public function setDisciplinario(?string $disciplinario): self
    {
        $this->disciplinario = $disciplinario;

        return $this;
    }

    public function getSolicitud(): ?Solicitud
    {
        return $this->solicitud;
    }

    public function setSolicitud(?Solicitud $solicitud): self
    {
        $this->solicitud = $solicitud;

        return $this;
    }

    public function getConciSacuerdo(): ?ConciSacuerdo
    {
        return $this->conciSacuerdo;
    }

    public function setConciSacuerdo(?ConciSacuerdo $conciSacuerdo): self
    {
        $this->conciSacuerdo = $conciSacuerdo;

        return $this;
    }

    public function getConciAcuerdo(): ?ConciAcuerdo
    {
        return $this->conciAcuerdo;
    }

    public function setConciAcuerdo(?ConciAcuerdo $conciAcuerdo): self
    {
        $this->conciAcuerdo = $conciAcuerdo;

        return $this;
    }
}
