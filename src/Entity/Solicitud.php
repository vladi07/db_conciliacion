<?php

namespace App\Entity;

use App\Repository\SolicitudRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SolicitudRepository::class)
 */
class Solicitud
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Materia::class, mappedBy="solicitud", orphanRemoval=true)
     */
    private $materia;

    /**
     * @ORM\ManyToOne(targetEntity=Reporte::class, inversedBy="solicitud")
     * @ORM\JoinColumn(nullable=false)
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
            $materium->setSolicitud($this);
        }

        return $this;
    }

    public function removeMaterium(Materia $materium): self
    {
        if ($this->materia->removeElement($materium)) {
            // set the owning side to null (unless already changed)
            if ($materium->getSolicitud() === $this) {
                $materium->setSolicitud(null);
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
