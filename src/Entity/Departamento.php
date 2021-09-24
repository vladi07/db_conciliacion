<?php

namespace App\Entity;

use App\Repository\DepartamentoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartamentoRepository::class)
 */
class Departamento
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity=Centro::class, mappedBy="dpto", orphanRemoval=true)
     */
    private $centro;

    /**
     * @ORM\OneToMany(targetEntity=Localidad::class, mappedBy="dpto")
     */
    private $localidad;

    public function __construct()
    {
        $this->centro = new ArrayCollection();
        $this->localidad = new ArrayCollection();
    }

    public function __toString()
    {
        return $this -> nombre;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection|Centro[]
     */
    public function getCentro(): Collection
    {
        return $this->centro;
    }

    public function addCentro(Centro $centro): self
    {
        if (!$this->centro->contains($centro)) {
            $this->centro[] = $centro;
            $centro->setDpto($this);
        }

        return $this;
    }

    public function removeCentro(Centro $centro): self
    {
        if ($this->centro->removeElement($centro)) {
            // set the owning side to null (unless already changed)
            if ($centro->getDpto() === $this) {
                $centro->setDpto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Localidad[]
     */
    public function getLocalidad(): Collection
    {
        return $this->localidad;
    }

    public function addLocalidad(Localidad $localidad): self
    {
        if (!$this->localidad->contains($localidad)) {
            $this->localidad[] = $localidad;
            $localidad->setDpto($this);
        }

        return $this;
    }

    public function removeLocalidad(Localidad $localidad): self
    {
        if ($this->localidad->removeElement($localidad)) {
            // set the owning side to null (unless already changed)
            if ($localidad->getDpto() === $this) {
                $localidad->setDpto(null);
            }
        }

        return $this;
    }
}
