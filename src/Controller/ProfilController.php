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
use App\Form\ParentsType;
use App\Repository\ParentsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

        $enfants = $parent->getChildren();

        return $this->render('profilParents/profilParents.html.twig', [
            'controller_name' => 'Profil',
            'parents' => $parent,
            'enfants' => $enfants,
        ]);
    }

    /**
     * @Route("/profil/edit/{id}", name="parents_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Parents $parent): Response
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

        return $this->redirectToRoute('profil');
    }
}
