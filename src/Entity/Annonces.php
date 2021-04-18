<?php

namespace App\Entity;

use App\Repository\AnnoncesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=AnnoncesRepository::class)
 * @Vich\Uploadable()
 */
class Annonces
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
    private $nomAnnonce;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionAnnonce;

    /**
     * @ORM\Column(type="float")
     */
    private $prixAnnonce;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoAnnonce;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="photoAnnonce")
     * @var File
     */
    private $photoImageFile;


    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function __construct()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }



    /**
     * @return File
     */
    public function getPhotoImageFile(): ?File
    {
        return $this->photoImageFile;
    }

    /**
     * @param File|null $photoImageFile
     */
    public function setPhotoImageFile(?File $photoImageFile = null): void
    {
        $this->photoImageFile = $photoImageFile;
        if(null !== $photoImageFile){
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAnnonce;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, cascade={"persist", "remove"})
     */
    private $categoriesAnnonce;

    /**
     * @ORM\ManyToOne(targetEntity=Regions::class, cascade={"persist", "remove"})
     */
    private $regionAnnonce;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, cascade={"persist", "remove"})
     */
    private $utilisateurAnnonce;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAnnonce(): ?string
    {
        return $this->nomAnnonce;
    }

    public function setNomAnnonce(string $nomAnnonce): self
    {
        $this->nomAnnonce = $nomAnnonce;

        return $this;
    }

    public function getDescriptionAnnonce(): ?string
    {
        return $this->descriptionAnnonce;
    }

    public function setDescriptionAnnonce(string $descriptionAnnonce): self
    {
        $this->descriptionAnnonce = $descriptionAnnonce;

        return $this;
    }

    public function getPrixAnnonce(): ?float
    {
        return $this->prixAnnonce;
    }

    public function setPrixAnnonce(float $prixAnnonce): self
    {
        $this->prixAnnonce = $prixAnnonce;

        return $this;
    }

    public function getPhotoAnnonce(): ?string
    {
        return $this->photoAnnonce;
    }

    public function setPhotoAnnonce(string $photoAnnonce): self
    {
        $this->photoAnnonce = $photoAnnonce;

        return $this;
    }

    public function getDateAnnonce(): ?\DateTimeInterface
    {
        return $this->dateAnnonce;
    }

    public function setDateAnnonce(\DateTimeInterface $dateAnnonce): self
    {
        $this->dateAnnonce = $dateAnnonce;

        return $this;
    }

    public function getCategoriesAnnonce(): ?Categories
    {
        return $this->categoriesAnnonce;
    }

    public function setCategoriesAnnonce(?Categories $categoriesAnnonce): self
    {
        $this->categoriesAnnonce = $categoriesAnnonce;

        return $this;
    }

    public function getRegionAnnonce(): ?Regions
    {
        return $this->regionAnnonce;
    }

    public function setRegionAnnonce(?Regions $regionAnnonce): self
    {
        $this->regionAnnonce = $regionAnnonce;

        return $this;
    }

    public function getUtilisateurAnnonce(): ?User
    {
        return $this->utilisateurAnnonce;
    }

    public function setUtilisateurAnnonce(?User $utilisateurAnnonce): self
    {
        $this->utilisateurAnnonce = $utilisateurAnnonce;

        return $this;
    }



}
