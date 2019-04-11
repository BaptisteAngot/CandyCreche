<?php

namespace App\Controller;

use App\Entity\Child;
use App\Form\ChildType;
use App\Repository\ChildRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/child")
 */
class ChildController extends AbstractController
{
    /**
     * @Route("/", name="child_index")
     */
    public function index(Request $request): Response
    {
        $child = new Child();
        $form = $this->createForm(ChildType::class, $child);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $child->setChildCreatedAt(new \DateTime('now'));
            $child->setChildIdParent($user = $this->getUser()->getId());
            $entityManager->persist($child);
            $entityManager->flush();

            return $this->redirectToRoute('profil');
        }

        return $this->render('child/new.html.twig', [
            'child' => $child,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/edit/{id}", name="child_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Child $child): Response
    {
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
    }

    /**
     * @Route("/{id}", name="child_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Child $child): Response
    {
        if ($this->isCsrfTokenValid('delete'.$child->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($child);
            $entityManager->flush();
        }

        return $this->redirectToRoute('profil');
    }
}
