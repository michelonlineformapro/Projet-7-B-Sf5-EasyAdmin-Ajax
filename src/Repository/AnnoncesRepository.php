<?php

namespace App\Repository;

use App\Entity\Annonces;
use App\Entity\PropertySearch;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Annonces|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annonces|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annonces[]    findAll()
 * @method Annonces[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnoncesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Annonces::class);
    }

    public function recherche($filtres = null){
        $query = $this->findAll();
        //filtres par categories
        if($filtres != null) {
            $query = $this->createQueryBuilder('r')
                ->andWhere('r.categoriesAnnonce IN (:cats)')
                ->setParameter(':cats', array_values($filtres));
        }
        return $query;
    }

    public function rechercheForm(PropertySearch $search){
        $query = $this->findAll();
        if($search->getLaCategories()){
            $query = $this->createQueryBuilder('c')
                ->andWhere('c.categoriesAnnonce = :categories')
                ->setParameter('categories', $search->getLaCategories());
        }

        if($search->getLaRegion()){
            $query = $this->createQueryBuilder('r')
                ->andWhere('r.regionAnnonce = :regions')
                ->setParameter('regions', $search->getLaRegion());
        }

        if($search->getMaxPrix()){
            $query = $this->createQueryBuilder('p')
                ->andWhere('p.prixAnnonce <= :maxprix')
                ->setParameter('maxprix', $search->getMaxPrix());
        }
        return $query;
    }

    public function annoncesParUser(){

    }

}
