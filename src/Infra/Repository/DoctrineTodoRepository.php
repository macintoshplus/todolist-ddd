<?php
/**
 * @copyright Macintoshplus (c) 2021
 * Added by : Macintoshplus at 01/09/2021 22:51
 */

declare(strict_types=1);

namespace App\Infra\Repository;

use App\Infra\Entity\DoctrineTodo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class DoctrineTodoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DoctrineTodo::class);
    }

    public function save(DoctrineTodo $entity){
        $this->_em->persist($entity);
        $this->_em->flush();
    }
}
