<?php

namespace App\Controller;

use App\Entity\Child;
use App\Entity\Disease;
use App\Entity\Parents;
use phpDocumentor\Reflection\Types\This;
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


        $enfants = $this->getDoctrine()
            ->getRepository(Child::class)
            ->findBy(['Child_id_parent' => $parent->getId()]);

        $i= 0;
        foreach ($enfants as $enfant)
        {
            $IDChild[$i] = $enfant->getId();
            foreach ($IDChild as $idenfant)
            {
                $maladies = $this->getDoctrine()
                    ->getRepository(Child::class)
                    ->findBy(['disease_id_child',$idenfant]);
            }
            $i++;
        }






        return $this->render('profilParents/profilParents.html.twig', [
            'controller_name' => 'ProfilController',
            'mail' => $parent->getParentsMail(),
            'name' => $parent->getParentsName(),
            'firstname' => $parent->getParentsFirstname(),
            'IDChildlist' => $IDChild,
            'maladie' => $maladies
        ]);
    }
}
