<?php

namespace App\Controller;

use App\Entity\Structure;
use App\Form\RegistrationStructureFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationStructureController extends AbstractController
{
    /**
     * @Route("/register_structure", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new Structure();
        $form = $this->createForm(RegistrationStructureFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setStructurePassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('structurePassword')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $this->redirectToRoute('accueil');
        }

        return $this->render('registration/registerStructure.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
