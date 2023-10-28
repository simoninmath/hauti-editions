<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route("/main")]

    public function goToMainPage()
    {
        $nom = "Simonin";
        $prenom = "Mathieu";
        $age = "42 ans";

        return $this->render('main.html.twig', [

            'nom' => $nom,
            'prenom' => $prenom,
            'age' => $age

        ]);
    }

}

