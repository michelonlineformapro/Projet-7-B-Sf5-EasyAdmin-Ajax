<?php


namespace App\Entity;


class PropertySearch
{
    //ICI PAS ORM DOCTRINE -> Recherche par prix et categorie

    /**
     * @var mixed
     */

    private $la_categories;

    /**
     * @var mixed
     */
    private $la_region;

    /**
     * @return mixed
     */
    public function getLaRegion()
    {
        return $this->la_region;
    }

    /**
     * @param mixed $la_region
     */
    public function setLaRegion($la_region): void
    {
        $this->la_region = $la_region;
    }

    //Un entier ou null
    /**
     * @var int|null
     */
    private $maxPrix;




    /**
     * @return mixed
     */
    public function getLaCategories()
    {
        return $this->la_categories;
    }

    /**
     * @param mixed $la_categories
     */
    public function setLaCategories($la_categories): void
    {
        $this->la_categories = $la_categories;
    }






    /**
     * @return int|null
     */
    public function getMaxPrix(): ?int
    {
        return $this->maxPrix;
    }

    /**
     * @param int|null $maxPrix
     */
    public function setMaxPrix(?int $maxPrix): void
    {
        $this->maxPrix = $maxPrix;
    }


}
