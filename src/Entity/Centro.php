<?php

namespace App\Entity;

use App\Repository\CentroRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CentroRepository::class)
 */
class Centro
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $matricula;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $resolucion;

    /**
     * @ORM\Column(type="date")
     */
    private $inicioVigencia;

    /**
     * @ORM\Column(type="date")
     */
    private $finVigencia;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $nombreCentro;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $representante;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $cargo;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $zona;

    /**
     * @ORM\Column(type="string", length=254)
     */
    private $direccion;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $telefono;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $fax;

    /**
     * @ORM\ManyToOne(targetEntity=Departamento::class, inversedBy="centro")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dpto;

    /**
     * @ORM\OneToMany(targetEntity=Reporte::class, mappedBy="centro", orphanRemoval=true)
     */
    private $reporte;

    public function __construct()
    {
        $this->reporte = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nombreCentro;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricula(): ?string
    {
        return $this->matricula;
    }

    public function setMatricula(string $matricula): self
    {
        $this->matricula = $matricula;

        return $this;
    }

    public function getResolucion(): ?string
    {
        return $this->resolucion;
    }

    public function setResolucion(?string $resolucion): self
    {
        $this->resolucion = $resolucion;

        return $this;
    }

    public function getInicioVigencia(): ?\DateTimeInterface
    {
        return $this->inicioVigencia;
    }

    public function setInicioVigencia(\DateTimeInterface $inicioVigencia): self
    {
        $this->inicioVigencia = $inicioVigencia;

        return $this;
    }

    public function getFinVigencia(): ?\DateTimeInterface
    {
        return $this->finVigencia;
    }

    public function setFinVigencia(\DateTimeInterface $finVigencia): self
    {
        $this->finVigencia = $finVigencia;

        return $this;
    }

    public function getNombreCentro(): ?string
    {
        return $this->nombreCentro;
    }

    public function setNombreCentro(string $nombreCentro): self
    {
        $this->nombreCentro = $nombreCentro;

        return $this;
    }

    public function getRepresentante(): ?string
    {
        return $this->representante;
    }

    public function setRepresentante(string $representante): self
    {
        $this->representante = $representante;

        return $this;
    }

    public function getCargo(): ?string
    {
        return $this->cargo;
    }

    public function setCargo(string $cargo): self
    {
        $this->cargo = $cargo;

        return $this;
    }

    public function getZona(): ?string
    {
        return $this->zona;
    }

    public function setZona(?string $zona): self
    {
        $this->zona = $zona;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getDpto(): ?Departamento
    {
        return $this->dpto;
    }

    public function setDpto(?Departamento $dpto): self
    {
        $this->dpto = $dpto;

        return $this;
    }

    /**
     * @return Collection|Reporte[]
     */
    public function getReporte(): Collection
    {
        return $this->reporte;
    }

    public function addReporte(Reporte $reporte): self
    {
        if (!$this->reporte->contains($reporte)) {
            $this->reporte[] = $reporte;
            $reporte->setCentro($this);
        }

        return $this;
    }

    public function removeReporte(Reporte $reporte): self
    {
        if ($this->reporte->removeElement($reporte)) {
            // set the owning side to null (unless already changed)
            if ($reporte->getCentro() === $this) {
                $reporte->setCentro(null);
            }
        }

        return $this;
    }
}
