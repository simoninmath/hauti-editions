<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class UserController extends AbstractController
{

    #[Route('/api/custom/protected_users_get_collection', name: 'users_get_collection', methods: ['GET'])]
    public function listUsers(UserRepository $UserRepo): Response
    {
        $UsersList = $UserRepo->findAll();
        return $this->json($UsersList);
    }


    #[Route('/api/custom/protected_users_get_by_id/{id}', name: 'users_get_by_id', methods: ['GET'])]
    public function showUser(User $User): Response
    {
        return $this->json($User);
    }


    #[Route('/api/custom/public_users_post', name: 'Users_post', methods: ['POST'])]  
    public function createUser(
        Request $request, 
        EntityManagerInterface $entityManager): Response
    {
        $User = new User;  
        $data = json_decode($request->getContent(), true);
        $User->setEmail($data['email']);  
        $entityManager->persist($User);
        $entityManager->flush();
        return $this->json($User);  
    }


    #[Route('/api/custom/protected_users_put/{id}', name: 'Users_put', methods: ['PUT'])]
    public function updateUser(Request $request, User $User, EntityManagerInterface $entityManager): Response
    {
        $data = json_decode($request->getContent(), true);
        $User->setId($data['id'] ?? $User->getId());
        $User->setEmail($data['email'] ?? $User->getEmail());
        $entityManager->flush();

        return $this->json($User);
    }

    
    #[Route('/api/custom/protected_users_patch/{id}', name: 'Users_patch', methods: ['PATCH'])]
    public function updateUserWithPatch(Request $request, User $User, EntityManagerInterface $entityManager): Response
    {
        $data = json_decode($request->getContent(), true);
        $User->setId($data['id'] ?? $User->getId());
        $User->setEmail($data['email'] ?? $User->getEmail());
        $entityManager->flush();

        return $this->json($User);
    }


    #[Route('/api/custom/protected_users_delete/{id}', name: 'delete_User', methods: ['DELETE'])]
    public function deleteUser(User $User, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($User);
        $entityManager->flush();

        return new Response(null, Response::HTTP_NO_CONTENT);
    }

}