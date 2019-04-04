<?php

namespace App\Controller;

use App\Entity\Child;
use App\Entity\Disease;
use App\Entity\Parents;
use phpDocumentor\Reflection\Types\This;
use App\Repository\DiseaseRepository;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil/{id}", name="profil")
     */
    public function index($id, DiseaseRepository $diseaseRepository)
    {
        $parent = $this->getDoctrine()
            ->getRepository(Parents::class)
            ->find($id);

        $enfants = $this->getDoctrine()
            ->getRepository(Child::class)
            ->findBy(['Child_id_parent' => $parent->getId()]);

//        $maladie = array();
//        foreach ($enfants as $enfant)
//        {
////            $maladie = $this->getDoctrine()
////                ->getRepository(Disease::class)
////                ->find($enfant->getId());
//            $result = $diseaseRepository->getDisease($enfant->getId());
//            array_push($result,$maladie);
//        }


        return $this->render('profilParents/profilParents.html.twig', [
            'controller_name' => 'Profil',
            'mail' => $parent->getParentsMail(),
            'name' => $parent->getParentsName(),
            'firstname' => $parent->getParentsFirstname(),
            'enfants' => $enfants
        ]);
    }
}
