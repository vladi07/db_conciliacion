<?php

namespace App\Entity;

use App\Repository\ReporteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReporteRepository::class)
 */
class Reporte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="bigint")
     */
    private $gestion;

    /**
     * @ORM\Column(type="bigint")
     */
    private $acta;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $virtual;

    /**
     * @ORM\OneToMany(targetEntity=Idioma::class, mappedBy="reporte")
     */
    private $idioma;

    /**
     * @ORM\OneToMany(targetEntity=Instruccion::class, mappedBy="reporte")
     */
    private $instruccion;

    /**
     * @ORM\OneToMany(targetEntity=Genero::class, mappedBy="reporte", orphanRemoval=true)
     */
    private $genero;

    /**
     * @ORM\OneToMany(targetEntity=Edad::class, mappedBy="reporte", orphanRemoval=true)
     */
    private $edad;

    /**
     * @ORM\OneToMany(targetEntity=Solicitante::class, mappedBy="reporte", orphanRemoval=true)
     */
    private $solicitante;

    /**
     * @ORM\Column(type="string", length=254, nullable=true)
     */
    private $fileReporte;

    /**
     * @ORM\ManyToOne(targetEntity=Centro::class, inversedBy="reporte")
     * @ORM\JoinColumn(nullable=false)
     */
    private $centro;

    /**
     * @ORM\OneToMany(targetEntity=Solicitud::class, mappedBy="reporte", orphanRemoval=true)
     */
    private $solicitud;

    /**
     * @ORM\OneToMany(targetEntity=ConciSacuerdo::class, mappedBy="reporte")
     */
    private $conciSacuerdo;

    /**
     * @ORM\OneToMany(targetEntity=ConciAcuerdo::class, mappedBy="reporte")
     */
    private $conciAcuerdo;

    public function __construct()
    {
        $this->idioma = new ArrayCollection();
        $this->instruccion = new ArrayCollection();
        $this->genero = new ArrayCollection();
        $this->edad = new ArrayCollection();
        $this->solicitante = new ArrayCollection();
        $this->solicitud = new ArrayCollection();
        $this->conciSacuerdo = new ArrayCollection();
        $this->conciAcuerdo = new ArrayCollection();
    }

    public function __toString(){
        return $this->gestion;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGestion(): ?string
    {
        return $this->gestion;
    }

    public function setGestion(string $gestion): self
    {
        $this->gestion = $gestion;

        return $this;
    }

    public function getActa(): ?string
    {
        return $this->acta;
    }

    public function setActa(string $acta): self
    {
        $this->acta = $acta;

        return $this;
    }

    public function getVirtual(): ?string
    {
        return $this->virtual;
    }

    public function setVirtual(?string $virtual): self
    {
        $this->virtual = $virtual;

        return $this;
    }

    /**
     * @return Collection|Idioma[]
     */
    public function getIdioma(): Collection
    {
        return $this->idioma;
    }

    public function addIdioma(Idioma $idioma): self
    {
        if (!$this->idioma->contains($idioma)) {
            $this->idioma[] = $idioma;
            $idioma->setReporte($this);
        }

        return $this;
    }

    public function removeIdioma(Idioma $idioma): self
    {
        if ($this->idioma->removeElement($idioma)) {
            // set the owning side to null (unless already changed)
            if ($idioma->getReporte() === $this) {
                $idioma->setReporte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Instruccion[]
     */
    public function getInstruccion(): Collection
    {
        return $this->instruccion;
    }

    public function addInstruccion(Instruccion $instruccion): self
    {
        if (!$this->instruccion->contains($instruccion)) {
            $this->instruccion[] = $instruccion;
            $instruccion->setReporte($this);
        }

        return $this;
    }

    public function removeInstruccion(Instruccion $instruccion): self
    {
        if ($this->instruccion->removeElement($instruccion)) {
            // set the owning side to null (unless already changed)
            if ($instruccion->getReporte() === $this) {
                $instruccion->setReporte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Genero[]
     */
    public function getGenero(): Collection
    {
        return $this->genero;
    }

    public function addGenero(Genero $genero): self
    {
        if (!$this->genero->contains($genero)) {
            $this->genero[] = $genero;
            $genero->setReporte($this);
        }

        return $this;
    }

    public function removeGenero(Genero $genero): self
    {
        if ($this->genero->removeElement($genero)) {
            // set the owning side to null (unless already changed)
            if ($genero->getReporte() === $this) {
                $genero->setReporte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Edad[]
     */
    public function getEdad(): Collection
    {
        return $this->edad;
    }

    public function addEdad(Edad $edad): self
    {
        if (!$this->edad->contains($edad)) {
            $this->edad[] = $edad;
            $edad->setReporte($this);
        }

        return $this;
    }

    public function removeEdad(Edad $edad): self
    {
        if ($this->edad->removeElement($edad)) {
            // set the owning side to null (unless already changed)
            if ($edad->getReporte() === $this) {
                $edad->setReporte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Solicitante[]
     */
    public function getSolicitante(): Collection
    {
        return $this->solicitante;
    }

    public function addSolicitante(Solicitante $solicitante): self
    {
        if (!$this->solicitante->contains($solicitante)) {
            $this->solicitante[] = $solicitante;
            $solicitante->setReporte($this);
        }

        return $this;
    }

    public function removeSolicitante(Solicitante $solicitante): self
    {
        if ($this->solicitante->removeElement($solicitante)) {
            // set the owning side to null (unless already changed)
            if ($solicitante->getReporte() === $this) {
                $solicitante->setReporte(null);
            }
        }

        return $this;
    }

    public function getFileReporte(): ?string
    {
        return $this->fileReporte;
    }

    public function setFileReporte(?string $fileReporte): self
    {
        $this->fileReporte = $fileReporte;

        return $this;
    }

    public function getCentro(): ?Centro
    {
        return $this->centro;
    }

    public function setCentro(?Centro $centro): self
    {
        $this->centro = $centro;

        return $this;
    }

    /**
     * @return Collection|Solicitud[]
     */
    public function getSolicitud(): Collection
    {
        return $this->solicitud;
    }

    public function addSolicitud(Solicitud $solicitud): self
    {
        if (!$this->solicitud->contains($solicitud)) {
            $this->solicitud[] = $solicitud;
            $solicitud->setReporte($this);
        }

        return $this;
    }

    public function removeSolicitud(Solicitud $solicitud): self
    {
        if ($this->solicitud->removeElement($solicitud)) {
            // set the owning side to null (unless already changed)
            if ($solicitud->getReporte() === $this) {
                $solicitud->setReporte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ConciSacuerdo[]
     */
    public function getConciSacuerdo(): Collection
    {
        return $this->conciSacuerdo;
    }

    public function addConciSacuerdo(ConciSacuerdo $conciSacuerdo): self
    {
        if (!$this->conciSacuerdo->contains($conciSacuerdo)) {
            $this->conciSacuerdo[] = $conciSacuerdo;
            $conciSacuerdo->setReporte($this);
        }

        return $this;
    }

    public function removeConciSacuerdo(ConciSacuerdo $conciSacuerdo): self
    {
        if ($this->conciSacuerdo->removeElement($conciSacuerdo)) {
            // set the owning side to null (unless already changed)
            if ($conciSacuerdo->getReporte() === $this) {
                $conciSacuerdo->setReporte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ConciAcuerdo[]
     */
    public function getConciAcuerdo(): Collection
    {
        return $this->conciAcuerdo;
    }

    public function addConciAcuerdo(ConciAcuerdo $conciAcuerdo): self
    {
        if (!$this->conciAcuerdo->contains($conciAcuerdo)) {
            $this->conciAcuerdo[] = $conciAcuerdo;
            $conciAcuerdo->setReporte($this);
        }

        return $this;
    }

    public function removeConciAcuerdo(ConciAcuerdo $conciAcuerdo): self
    {
        if ($this->conciAcuerdo->removeElement($conciAcuerdo)) {
            // set the owning side to null (unless already changed)
            if ($conciAcuerdo->getReporte() === $this) {
                $conciAcuerdo->setReporte(null);
            }
        }

        return $this;
    }

}