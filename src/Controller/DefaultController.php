<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(name: 'app_')]

class DefaultController extends AbstractController
{
    #[Route('/home', name: 'home')]

    public function renderHomePage()
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

    #[Route('/default', name: 'default')]

    public function renderDefaultPage()
    {
        return $this->render('default.html.twig');
    }

    #[Route('/contact', name: 'contact')]

    public function renderContactPage()
    {
        return $this->render('contact.html.twig');
    }

}

