<?php

namespace App\Entity;

use App\Repository\RegionsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RegionsRepository::class)
 */
class Regions
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomRegion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRegion(): ?string
    {
        return $this->nomRegion;
    }

    public function setNomRegion(string $nomRegion): self
    {
        $this->nomRegion = $nomRegion;

        return $this;
    }

    public function __toString(){
        // to show the name of the Category in the select
        return (string) $this->nomRegion;
        // to show the id of the Category in the select
        // return $this->id;
    }
}
