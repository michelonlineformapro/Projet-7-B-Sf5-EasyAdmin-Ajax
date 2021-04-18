<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
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
    private $typeCategories;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeCategories(): ?string
    {
        return $this->typeCategories;
    }

    public function setTypeCategories(string $typeCategories): self
    {
        $this->typeCategories = $typeCategories;

        return $this;
    }

    public function __toString(){
        // to show the name of the Category in the select
        return (string) $this->typeCategories;
        // to show the id of the Category in the select
        // return $this->id;
    }

}
