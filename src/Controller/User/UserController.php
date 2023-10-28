<?php

namespace App\Controller\User;

use PhpParser\Node\Name;
use Random\Randomizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user/{userId}', name: 'user_page')]

    public function goToUserPage($userId)
    {
        $nom = "Simonin";
        $prenom = "Mathieu";
        $age = "42 ans";
        $userName = "{$prenom} + {$nom} + {$age}";
        $userId = hash('md5', $userName);

        return $this->render('user.html.twig', [

            'userId' => $userId,
            'nom' => $nom,
            'prenom' => $prenom,
            'age' => $age

        ]);
    }

    public function getTitlePage(Request $request)
    {
        $routeName = $request->get('_route');

        return $this->render('user.html.twig', [

            'pageTitle' => ucfirst($routeName)

        ]);
    }
}