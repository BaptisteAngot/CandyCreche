<?php

namespace App\Controller;

use App\Entity\Parents;
use phpDocumentor\Reflection\Types\This;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil/{id}", name="profil")
     */
    public function index($id, AuthorizationCheckerInterface $authChecker)
    {

        if (true === $authChecker->isGranted('ROLE_PARENT'))
        {
            $parent = $this->getDoctrine()
                ->getRepository(Parents::class)
                ->find($id);

            $enfants = $parent->getChildren();

            return $this->render('profilParents/profilParents.html.twig', [
                'controller_name' => 'Profil',
                'parents' => $parent,
                'enfants' => $enfants,
            ]);
        }
        elseif(true === $authChecker->isGranted('ROLE_STRUCTURE'))
        {
        }
        else
        {
            return $this->render('403/403.html.twig',[
                'erreur' => 'ACCES FORBIDEN'
            ]);
        }
    }
}
