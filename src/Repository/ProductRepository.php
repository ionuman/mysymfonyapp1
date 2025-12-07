<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @return Product[] Returneaza un array de obiecte filtrate Product dupa nume sau descriere.
     */
    public function findBySearchTerm(?string $term): array
    {
        if (!$term) {
            return $this->findAll();
        }

        // Crează o interogare (Query Builder)
        return $this->createQueryBuilder('p')
            // Caută unde 'p.name' conține termenul, OR 'p.description' conține termenul
            ->andWhere('p.name LIKE :term OR p.description LIKE :term')
            // Asigură că termenul este încapsulat cu simboluri SQL '%' pentru căutare parțială
            ->setParameter('term', '%' . $term . '%')
            // Sortează rezultatele după nume
            ->orderBy('p.name', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
