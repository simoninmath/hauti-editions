<?php

namespace App\Repository;

use App\Entity\user;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<user>
 *
 * @method user|null find($id, $lockMode = null, $lockVersion = null)
 * @method user|null findOneBy(array $criteria, array $orderBy = null)
 * @method user[]    findAll()
 * @method user[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class userRepository extends ServiceEntityRepository {

    public function __construct(
        ManagerRegistry $registry
    ) {
        parent::__construct($registry, user::class);
    }


    public function fetchInfoFromuserWithDql(): array
    { 
        $entityManager = $this->getDoctrine()->getManager();
        $dql = $entityManager->createQuery(

            'SELECT user.id, 
             user.emai, user.roles, 
             FROM App\Entity\user 
             AS user'
        );

        $result = $dql->getResult();

        return $result;
    }


    public function insertEmailFromuser(int $id, string $email, string $roles): void
    {
        $entityManager = $this->getDoctrine()->getManager();
        $connection = $entityManager->getConnection();

        $dql = "INSERT INTO 
                user (id, email, createdAt, roles) 
                VALUES 
                (:id, :email, NOW(), roles)";

        $preparedQuery = $connection->prepare($dql);
        $preparedQuery->bindParam(':id', $id);
        $preparedQuery->bindParam(':email', $email);
        $preparedQuery->bindParam(':roles', $roles);
        $preparedQuery->execute();
    }

}
