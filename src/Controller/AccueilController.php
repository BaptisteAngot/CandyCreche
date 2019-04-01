<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    /**
     * @Route("/profilparent", name="profilparent")
     */
    public function profil()
    {
        return $this->render('profilParents/profilParents.html.twig',[
            'controller_name' => "Profil Parent",
        ]);
    }

    /**
     * @Route("/listeStructures", name="listeStructures")
     */
    public function listeStructures()
    {
        return $this->render('listeStructures/listeStructures.html.twig',[
            'controller_name' => "Profil Parent",
        ]);
    }

    /**
     * @Route("/structureDetails", name="structureDetails")
     */
    public function structureDetails()
    {
        return $this->render('structureDetails/structureDetails.html.twig',[
            'controller_name' => "Profil Parent",
        ]);
    }
}
