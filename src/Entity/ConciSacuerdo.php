<?php

namespace App\Entity;

use App\Repository\ConciSacuerdoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConciSacuerdoRepository::class)
 */
class ConciSacuerdo
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
    private $abandono;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $inasistencia;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $noAcuerdo;

    /**
     * @ORM\OneToMany(targetEntity=Materia::class, mappedBy="conciSacuerdo", orphanRemoval=true)
     */
    private $materia;

    /**
     * @ORM\ManyToOne(targetEntity=Reporte::class, inversedBy="conciSacuerdo")
     */
    private $reporte;

    public function __construct()
    {
        $this->materia = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAbandono(): ?string
    {
        return $this->abandono;
    }

    public function setAbandono(?string $abandono): self
    {
        $this->abandono = $abandono;

        return $this;
    }

    public function getInasistencia(): ?string
    {
        return $this->inasistencia;
    }

    public function setInasistencia(?string $inasistencia): self
    {
        $this->inasistencia = $inasistencia;

        return $this;
    }

    public function getNoAcuerdo(): ?string
    {
        return $this->noAcuerdo;
    }

    public function setNoAcuerdo(?string $noAcuerdo): self
    {
        $this->noAcuerdo = $noAcuerdo;

        return $this;
    }

    /**
     * @return Collection|Materia[]
     */
    public function getMateria(): Collection
    {
        return $this->materia;
    }

    public function addMaterium(Materia $materium): self
    {
        if (!$this->materia->contains($materium)) {
            $this->materia[] = $materium;
            $materium->setConciSacuerdo($this);
        }

        return $this;
    }

    public function removeMaterium(Materia $materium): self
    {
        if ($this->materia->removeElement($materium)) {
            // set the owning side to null (unless already changed)
            if ($materium->getConciSacuerdo() === $this) {
                $materium->setConciSacuerdo(null);
            }
        }

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
