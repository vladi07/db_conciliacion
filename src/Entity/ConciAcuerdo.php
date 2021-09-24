<?php

namespace App\Entity;

use App\Repository\ConciAcuerdoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConciAcuerdoRepository::class)
 */
class ConciAcuerdo
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
    private $total;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $parcial;

    /**
     * @ORM\OneToMany(targetEntity=Materia::class, mappedBy="conciAcuerdo", orphanRemoval=true)
     */
    private $materia;

    /**
     * @ORM\ManyToOne(targetEntity=Reporte::class, inversedBy="conciAcuerdo")
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

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(?string $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getParcial(): ?string
    {
        return $this->parcial;
    }

    public function setParcial(?string $parcial): self
    {
        $this->parcial = $parcial;

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
            $materium->setConciAcuerdo($this);
        }

        return $this;
    }

    public function removeMaterium(Materia $materium): self
    {
        if ($this->materia->removeElement($materium)) {
            // set the owning side to null (unless already changed)
            if ($materium->getConciAcuerdo() === $this) {
                $materium->setConciAcuerdo(null);
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
