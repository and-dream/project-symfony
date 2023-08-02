<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function home()
    {
        $title = "Bienvenue sur le site des employés";
        return $this->render('employe/employes.html.twig', [
           'title' =>$title 
        ]);
    }
}
