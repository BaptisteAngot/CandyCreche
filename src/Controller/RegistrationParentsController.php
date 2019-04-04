<?php

namespace App\Controller;

use App\Entity\Parents;
use App\Form\RegistrationsParentsFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationParentsController extends AbstractController
{
    /**
     * @Route("/register_parents", name="app_register_parents")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new Parents();
        $form = $this->createForm(RegistrationsParentsFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setParentsPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('parentsPassword')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $this->redirectToRoute('accueil');
        }

        return $this->render('registration/registerParents.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
