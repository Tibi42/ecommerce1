<?php

namespace App\Repository;

use App\Entity\Velo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Velo>
 */
class VeloRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Velo::class);
    }

    //    /**
    //     * @return Velo[] Returns an array of Velo objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('v.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Velo
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    /**
     * Récupère tous les vélos
     * @return Velo[] Returns an array of Velo objects
     */
    public function findAllVelo(): array
    {
        return $this->findAll();  // ← Utilise la méthode héritée
    }

    /**
     * Récupère le premier vélo (pour "Mon vélo")
     */
    public function findFirstVelo(): ?Velo
    {
        return $this->findOneBy([], ['id' => 'ASC']);  // ← Tri par ID croissant
    }

    /**
     * Récupère les vélos en promotion
     * @return Velo[] Returns an array of Velo objects
     */
    public function findVelosEnPromotion(): array
    {
        return $this->createQueryBuilder('v')  // ← 'v' est l'alias pour Velo
            ->andWhere('v.estEnPromotion = :promotion')  // ← Condition WHERE
            ->setParameter('promotion', true)             // ← Paramètre sécurisé
            ->orderBy('v.dateAjout', 'DESC')             // ← Tri par date décroissant
            ->getQuery()                                  // ← Construit la requête
            ->getResult();                               // ← Exécute et retourne les résultats
    }

    public function findByType(string $categorie): array
    {
        return $this->findBy(['categorie' => $categorie]);
    }

    public function findExpensiveVelos(float $price): array
    {
        return $this->createQueryBuilder('v')
            ->where('v.prix > :price')
            ->setParameter('price', $price)
            ->orderBy('v.prix', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère toutes les catégories distinctes
     * @return string[] Returns an array of unique category names
     */
    public function findAllCategories(): array
    {
        $result = $this->createQueryBuilder('v')
            ->select('DISTINCT v.categorie')
            ->orderBy('v.categorie', 'ASC')
            ->getQuery()
            ->getResult();

        // Convertit [['categorie' => 'VTT'], ...] en ['VTT', ...]
        return array_column($result, 'categorie');
    }
}
