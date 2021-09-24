<?php

namespace App\Entity;

use App\Repository\LocalidadRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocalidadRepository::class)
 */
class Localidad
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $nombre;

    /**
     * @ORM\ManyToOne(targetEntity=Departamento::class, inversedBy="localidad")
     */
    private $dpto;

    public function __toString()
    {
        return $this->nombre;
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

    public function getDpto(): ?Departamento
    {
        return $this->dpto;
    }

    public function setDpto(?Departamento $dpto): self
    {
        $this->dpto = $dpto;

        return $this;
    }
}
