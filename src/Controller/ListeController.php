<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListeController extends AbstractController
{
    /**
     * @Route("/liste", name="liste")
     */
    public function index()
    {
        return $this->render('liste/index.html.twig', [
            'controller_name' => 'ListeController',
        ]);
    }
}
