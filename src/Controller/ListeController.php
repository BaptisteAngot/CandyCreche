<?php

namespace App\Controller;

use App\Entity\Structure;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class ListeController extends AbstractController
{
    /**
     * @Route("parents/liste", name="liste")
     */
    public function index(AuthorizationCheckerInterface $authChecker)
    {
        if (true === $authChecker->isGranted('ROLE_PARENT'))
        {
            $repository = $this->getDoctrine()->getRepository(Structure::class);

            $structures = $repository->findAll();
            return $this->render('listeStructures/listeStructures.html.twig',[
                'structures' => $structures
            ]);
        }
        else
        {
            return $this->render('403/403.html.twig',[
                'erreur' => 'ACCES INTERDIT'
            ]);
        }
    }
}
