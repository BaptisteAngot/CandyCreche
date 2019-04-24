<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Child;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class APIController extends AbstractController
{
    /**
     * @Route("/authorize/getinfo/{id}",name="getinfo")
     */
    public function getInfo($id, AuthorizationCheckerInterface $authorizationChecker)
    {
        if (true === $authorizationChecker->isGranted('ROLE_AUTHO')) {
            $repository = $this->getDoctrine()->getRepository(Child::class);
            $enfant = $repository->find($id);

            if ($enfant !=null)
            {
                return $this->render(
                    'API/index.html.twig',[
                        'info' => $enfant,
                    ]
                );
            }
            else
            {
                return $this->render(
                    '403/403.html.twig',[
                        'erreur' => 'Enfant inexistant'
                    ]
                );
            }
        }
        else
        {
            return $this->redirectToRoute('autho_login');
        }

    }
}
