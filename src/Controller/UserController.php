<?php

namespace App\Controller;

use PhpParser\Node\Name;
use Random\Randomizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user/{userId}', name: 'User Page')]

    public function goToUserPage($userId)
    {
        $userName = "Mathieu";
        $userId = hash('md5', $userName);

        return $this->render("user.html.twig", [

            'user' => $userId,

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