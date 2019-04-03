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


        $enfant = $this->getDoctrine()
            ->getRepository(Child::class)
            ->findBy(['Child_id_parent' => $parent->getId()]);

        return $this->render('profilParents/profilParents.html.twig', [
            'controller_name' => 'ProfilController',
            'mail' => $parent->getParentsMail(),
            'name' => $parent->getParentsName(),
            'firstname' => $parent->getParentsFirstname(),
            'test' => $enfant
//            'namechild' => $enfant->getChildName(),
//            'firstnamechild' => $enfant->getChildFirstname(),
//            'yearschild' => $enfant->getChildYears(),
//            'otherchild' => $enfant->getChildOthers(),
//            'diseasename' => $maladie->getDiseaseName(),
//            'test' => $maladie->getResult(),
        ]);
    }
}
