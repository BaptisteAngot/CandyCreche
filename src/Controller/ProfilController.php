<?php

namespace App\Controller;

use App\Entity\Parents;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil/{id}", name="profil")
     */
    public function index($id)
    {

        $parent = $this->getDoctrine()
            ->getRepository(Parents::class)
            ->find($id);

//        return $parent;
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }
}
