<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChildController extends AbstractController
{
    /**
     * @Route("/child", name="child")
     */
    public function index()
    {
        return $this->render('child/index.html.twig', [
            'controller_name' => 'ChildController',
        ]);
    }
}
