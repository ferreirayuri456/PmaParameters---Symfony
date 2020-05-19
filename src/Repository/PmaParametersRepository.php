<?php

namespace App\Repository;

use App\Entity\PmaParameters;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PmaParameters|null find($id, $lockMode = null, $lockVersion = null)
 * @method PmaParameters|null findOneBy(array $criteria, array $orderBy = null)
 * @method PmaParameters[]    findAll()
 * @method PmaParameters[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PmaParametersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PmaParameters::class);
    }

}
