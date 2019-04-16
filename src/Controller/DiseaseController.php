<?php

namespace App\Controller;

use App\Entity\Disease;
use App\Form\DiseaseType;
use App\Repository\DiseaseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/child/disease")
 */
class DiseaseController extends AbstractController
{
    /**
     * @Route("/{id}", name="disease_index", methods={"GET","POST"})
     */
    public function index(Request $request): Response
    {
        $disease = new Disease();
        $form = $this->createForm(DiseaseType::class, $disease);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $disease->setDiseaseCreatedAt(new \DateTime('now'));
            $entityManager->persist($disease);
            $entityManager->flush();

            return $this->redirectToRoute('profil');
        }

        return $this->render('disease/new.html.twig', [
            'disease' => $disease,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="disease_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Disease $disease): Response
    {
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
    public function delete(Request $request, Disease $disease): Response
    {
        if ($this->isCsrfTokenValid('delete'.$disease->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($disease);
            $entityManager->flush();
        }

        return $this->redirectToRoute('profil');
    }
}
