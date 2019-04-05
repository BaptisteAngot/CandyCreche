<?php

namespace App\Controller;

use App\Entity\Child;
use App\Entity\Disease;
use App\Entity\Parents;
use App\Repository\DiseaseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ParentsType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

    /**
     * @Route("/profil/edit/{id}", name="parents_edit", methods={"GET","POST"})
     */
    public function editParents(Request $request, Parents $parent): Response
    {
        $form = $this->createForm(ParentsType::class, $parent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('profil', [
                'id' => $parent->getId(),
            ]);
        }

        return $this->render('profilParents/edit.html.twig', [
            'parent' => $parent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/profil/delete/{id}", name="parents_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Parents $parent): Response
    {
        if ($this->isCsrfTokenValid('delete' . $parent->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($parent);
            $entityManager->flush();
        }
        SecurityController::logout();

        return $this->redirectToRoute('accueil');
    }
}
