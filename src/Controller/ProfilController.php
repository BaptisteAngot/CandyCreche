<?php

namespace App\Controller;

use App\Entity\Child;
use App\Entity\Disease;
use App\Entity\Parents;
use App\Entity\Structure;
use App\Repository\DiseaseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ParentsType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class ProfilController extends AbstractController
{
    /**
     * @Route("/parents/profil", name="profil")
     */
    public function index(AuthorizationCheckerInterface $authChecker, Child $kinder)
    {
        if (true === $authChecker->isGranted('ROLE_PARENT'))
        {
            $parent = $this->getUser();
            $child=$parent->getChildren();
            //$child->getDiseases();
            /*
            echo '<pre>';
            \Doctrine\Common\Util\Debug::dump($parent);
            echo '</pre>';*/

            //code nouaedra
            $enfants = $this->getUser()->getChildren();
            $i = 0;

            while ($enfants[$i] != Null) {
                echo '<pre>';
                \Doctrine\Common\Util\Debug::dump($enfants[$i]);
                echo '</pre>';
                $i++;
            }
            //code nouaedra

            return $this->render('profilParents/profilParents.html.twig', [
                'controller_name' => 'Profil',
                'parents' => $parent,
                'enfants' => $parent->getChildren(),
            ]);
        }
        else
        {
            return $this->render('403/403.html.twig',[
                'erreur' => 'ACCES INTERDIT'
            ]);
        }
    }

    /**
     * @Route("/structures/profil", name="profilstructure")
     */
    public function profilstructure(AuthorizationCheckerInterface $authChecker)
    {
        if (true === $authChecker->isGranted('ROLE_STRUCTURE'))
        {
            $structure = $this->getUser();

            return $this->render('profilStructures/profilstructure.html.twig',[
                'controller_name' => 'Profil Structure',
                'structure' => $structure
            ]);
        }
        else
        {
            return $this->render('403/403.html.twig',[
                'erreur' => 'ACCES INTERDIT'
            ]);
        }
    }

    /**
     * @Route("/parents/profil/edit", name="parents_edit", methods={"GET","POST"})
     */
    public function editParent(Request $request, AuthorizationCheckerInterface $authChecker): Response
    {
        if (true === $authChecker->isGranted('ROLE_PARENT')) {
            $user = $this->getUser();
            $form = $this->createForm(ParentsType::class, $user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $user->setParentsUpdatedAt(new \DateTime('now'));
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('profil');
            }

            return $this->render('profilParents/edit.html.twig', [
                'parent' => $user,
                'form' => $form->createView(),
            ]);
        } else {
            return $this->render('403/403.html.twig', [
                'erreur' => 'ACCES FORBIDEN'
            ]);
        }
    }

    /**
     * @Route("/parents/profil/delete/{id}", name="parents_delete", methods={"DELETE"})
     */

    public function deleteParent(Request $request, Parents $parent, TokenStorageInterface $tokenStorage, AuthorizationCheckerInterface $authChecker): Response
    {
        if (true === $authChecker->isGranted('ROLE_PARENT')) {
                if ($this->isCsrfTokenValid('delete' . $parent->getId(), $request->request->get('_token'))) {
                    $entityManager = $this->getDoctrine()->getManager();

                    $enfants = $this->getUser()->getChildren();
                    $i = 0;

                    while ($enfants[$i] != Null) {
                        $o = 0;
                        $maladie = $enfants[$i]->getDiseases();

                        while ($maladie[$o] != Null) {
                            $entityManager->remove($maladie[$o]);
                            $o++;
                        }
                        $entityManager->remove($enfants[$i]);
                        $i++;
                    }

                    $this->get('security.token_storage')->setToken(null);
                    $entityManager->remove($parent);
                    $entityManager->flush();

                    return $this->redirectToRoute('accueil');
                } else {
                    return $this->render('403/403.html.twig', [
                        'erreur' => 'ACCES FORBIDEN'
                    ]);
                }
        }
    }


}
