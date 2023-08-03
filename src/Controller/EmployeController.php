<?php

namespace App\Controller;

use App\Form\EmployesType;
use App\Entity\CompanyEmployes;
use App\Repository\CompanyEmployesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmployeController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function home()
    {
        $title = "Bienvenue sur le site des employés";
        return $this->render('employe/index.html.twig', [
           'title' =>$title 
        ]);
    }
     // 2 routes (ajout) & (modifier) dans la même méthode
    #[Route('employer/modifier{id}', name: 'employe_modifier')]
    #[Route('/employe/employes', name: 'employe_ajout')]
    public function ajout(Request $request, EntityManagerInterface $manager, CompanyEmployes $employes = null) :Response
    {
        if ($employes == null) {
            $employe = new CompanyEmployes;
        }
        
        $employe = new CompanyEmployes;
        $form = $this->createForm(EmployesType::class, $employe);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($employe);
            $manager->flush();
            return $this->redirectToRoute('accueil');
        }
        
        return $this->render('employe/employes.html.twig', [
            'formEmploye' => $form,
        ]);
        //le tableau sert à envoyer les données dans ma page de vue, pour pouvoir l'utiliser il faut en amont dans mon controller passer par un tableau
    }

    #[Route('employe/gestion', name: 'employe_gestion')]
    public function gestion( CompanyEmployesRepository $repo)
    {
        $employe = $repo->findAll();
        return $this->render('employe/gestion.html.twig', [
            'employes' => $employe,
        ]);
    }
 
    #[Route('/employe/supprimer{id}', name: 'employe_supprimer')]
    public function supprimer(EntityManagerInterface $manager, CompanyEmployes $employe)
    {    
        $manager->remove($employe);
        $manager->flush();
        
        return $this->redirectToRoute('employe_gestion');
    }

}

