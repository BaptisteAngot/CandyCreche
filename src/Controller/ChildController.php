<?php

namespace App\Controller;

use App\Entity\Child;
use App\Form\ChildType;
use App\Repository\ChildRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * @Route("/profil/child")
 */
class ChildController extends AbstractController
{
    /**
     * @Route("/", name="child_index")
     */
    public function index(Request $request, AuthorizationCheckerInterface $authChecker): Response
    {
        if (true === $authChecker->isGranted('ROLE_PARENT')) {

            $child = new Child();
            $form = $this->createForm(ChildType::class, $child);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $child->setChildCreatedAt(new \DateTime('now'));
                $child->setChildIdParent($user = $this->getUser());
                $entityManager->persist($child);
                $entityManager->flush();

                return $this->redirectToRoute('profil');
            }

            return $this->render('child/index.html.twig', [
                'child' => $child,
                'form' => $form->createView(),
            ]);
        } else {
            return $this->render('403/403.html.twig', ['erreur' => 'ACCES FORBIDEN']);
        }

    }

    /**
     * @Route("/edit/{id}", name="child_edit", methods={"GET","POST"})
     */
    public
    function edit(Request $request, Child $child, AuthorizationCheckerInterface $authChecker): Response
    {
        if (true === $authChecker->isGranted('ROLE_PARENT')) {

            $enfants = $this->getUser()->getChildren();
            $i = 0;
            $parent = false;

            while ($enfants[$i] != Null) {
                if ($child == $enfants[$i]) {
                    $parent = true;
                }
                $i++;
            }

            if ($parent === true) {
                $form = $this->createForm(ChildType::class, $child);
                $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {
                    $child->setChildUpdatedAt(new \DateTime('now'));
                    $this->getDoctrine()->getManager()->flush();

                    return $this->redirectToRoute('profil');
                }

                return $this->render('child/edit.html.twig', [
                    'child' => $child,
                    'form' => $form->createView(),
                ]);
            } else {
                return $this->render('403/403.html.twig', ['erreur' => 'ACCES FORBIDEN']);
            }

        } else {
            return $this->render('403/403.html.twig', ['erreur' => 'ACCES FORBIDEN']);
        }
    }

    /**
     * @Route("/{id}", name="child_delete", methods={"DELETE"})
     */
    public
    function delete(Request $request, Child $child, AuthorizationCheckerInterface $authChecker): Response
    {
        if (true === $authChecker->isGranted('ROLE_PARENT')) {

            if ($this->isCsrfTokenValid('delete' . $child->getId(), $request->request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $maladie = $child->getDiseases();

                $i = 0;
                while ($maladie[$i] != Null) {
                    $entityManager->remove($maladie[$i]);
                    $i++;
                }
                $entityManager->remove($child);
                $entityManager->flush();
            }

            return $this->redirectToRoute('profil');
        } else {
            return $this->render('403/403.html.twig', ['erreur' => 'ACCES FORBIDEN']);
        }
    }
}
