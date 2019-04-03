<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AuthentifyController extends AbstractController
{
    /**
     * @Route("/authentify", name="authentify")
     */
    public function index()
    {
        return $this->render('authentify/index.html.twig', [
            'controller_name' => 'AuthentifyController',
        ]);
    }
}
