<?php

namespace App\Controller;

use App\Entity\Disease;
use App\Entity\Child;
use App\Form\DiseaseType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * @Route("/profil/child/disease")
 */
class DiseaseController extends AbstractController
{
    /**
     * @Route("/{id}", name="disease_index", methods={"GET","POST"})
     */
    public function index(Request $request, Child $child, AuthorizationCheckerInterface $authChecker): Response
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
                $disease = new Disease();
                $form = $this->createForm(DiseaseType::class, $disease);
                $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {
                    $entityManager = $this->getDoctrine()->getManager();
                    $disease->addDiseaseIdChild($child);
                    $disease->setDiseaseCreatedAt(new \DateTime('now'));
                    $entityManager->persist($disease);
                    $entityManager->flush();

                    return $this->redirectToRoute('profil');
                }

                return $this->render('disease/new.html.twig', [
                    'disease' => $disease,
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
     * @Route("/{id}/edit", name="disease_edit", methods={"GET","POST"})
     */
    public
    function edit(Request $request, Child $child, Disease $disease): Response
    {
        $child->getDiseases();
        $form = $this->createForm(DiseaseType::class, $disease);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('profil');
        }

        return $this->render('disease/edit.html.twig', [
            'disease' => $disease,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="disease_delete", methods={"DELETE"})
     */
    public
    function delete(Request $request, Disease $disease, Child $child): Response
    {
        if ($this->isCsrfTokenValid('delete' . $disease->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($disease);
            $entityManager->flush();
        }

        return $this->redirectToRoute('profil');
    }
}
