<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/")]

class MainController extends AbstractController
{

    public function test()
    {
        return $this->render("main.html.twig");
    }

}

