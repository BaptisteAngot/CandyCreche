<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GestionPersonnelController extends AbstractController
{
    /**
     * @Route("/gestion/personnel", name="gestion_personnel")
     */
    public function index()
    {
        return $this->render('gestion_personnel/index.html.twig', [
            'controller_name' => 'GestionPersonnelController',
        ]);
    }
}
