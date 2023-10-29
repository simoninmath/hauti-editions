<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(name: 'app_')]

class DefaultController extends AbstractController
{
    #[Route('/home', name: 'home')]

    public function goToHomePage()
    {
        $nom = "Simonin";
        $prenom = "Mathieu";
        $age = "42 ans";

        return $this->render('home.html.twig', [

            'nom' => $nom,
            'prenom' => $prenom,
            'age' => $age

        ]);
    }

    #[Route('/contact', name: 'contact')]

    public function goToContactPage()
    {
        return $this->render('contact.html.twig');
    }

}

