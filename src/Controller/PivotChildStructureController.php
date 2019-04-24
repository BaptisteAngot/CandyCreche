<?php

namespace App\Controller;

use App\Entity\PivotChildStructure;
use App\Entity\Structure;
use App\Form\PivotChildStructureType;
use App\Repository\PivotChildStructureRepository;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityRepository;

/**
 * @Route("/parents/liste")
 */
class PivotChildStructureController extends AbstractController
{
    /**
     * @Route("/{id}", name="inscrireEnfant", methods={"GET","POST"})
     */
    public function index(Request $request, Structure $structure): Response
    {
        $pivotChildStructure = new PivotChildStructure();
        $form = $this->createForm(PivotChildStructureType::class, $pivotChildStructure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $this->getUser()->getChildren();
            $child = $pivotChildStructure->getPivotIdChild();
            $structureId = $structure->getId();

            if (true === $user->contains($child)) {
                $child = $pivotChildStructure->getPivotIdChild()->getId();

                $entityManager = $this->getDoctrine()->getManager();

                $RAW_QUERY = 'SELECT * FROM pivot_child_structure 
inner join pivot_child_structure_structure 
on pivot_child_structure.id = pivot_child_structure_structure.pivot_child_structure_id 
where pivot_child_structure.pivot_id_child_id = :child 
and pivot_child_structure_structure.structure_id = :structure;';

                $statement = $entityManager->getConnection()->prepare($RAW_QUERY);
                $statement->bindValue(':child', $child);
                $statement->bindValue(':structure', $structureId);
                $statement->execute();
                $result = $statement->fetchAll();

                if (empty($result)) {

                    $pivotChildStructure->addPivotIdStructure($structure);
                    $entityManager->persist($pivotChildStructure);
                    $entityManager->flush();
                }
            }
            return $this->redirectToRoute('liste');
        }

        return $this->render('pivot_child_structure/index.html.twig', [
            'pivot_child_structure' => $pivotChildStructure,
            'form' => $form->createView(),
        ]);
    }
}
