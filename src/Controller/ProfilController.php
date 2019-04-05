<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     */
    public function index(AuthorizationCheckerInterface $authChecker)
    {
        if (true === $authChecker->isGranted('ROLE_PARENT'))
        {
            $parent = $this->getUser();

            return $this->render('profilParents/profilParents.html.twig', [
                'controller_name' => 'Profil',
                'parents' => $parent,
                'enfants' => $parent->getChildren(),
            ]);
        }
        elseif(true === $authChecker->isGranted('ROLE_STRUCTURE'))
        {
            $structure = $this->getUser();

            return $this->render('profil/index.html.twig',[
                'structure' => $structure,
            ]);
        }
        else
        {
            return $this->render('403/403.html.twig',[
                'erreur' => 'ACCES FORBIDEN'
            ]);
        }
    }
}
