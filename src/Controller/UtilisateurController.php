<?php

namespace App\Controller;

use App\Entity\Annonces;
use App\Entity\User;
use App\Repository\AnnoncesRepository;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UtilisateurController
 * @package App\Controller
 * @IsGranted("ROLE_USER")
 */

class UtilisateurController extends AbstractController
{
    /**
     * @Route("/utilisateur", name="utilisateur")
     */
    public function index(AnnoncesRepository $annoncesRepository, UserRepository $userRepository): Response
    {
        $user = new User();
        $user = $this->getUser();

        $annonce  = $annoncesRepository->findBy([
            'id' => $user
        ]);
        //dd($id);

        return $this->render('utilisateur/index.html.twig', [
            'controller_name' => 'UtilisateurController',
            'annonces' => $annonce
        ]);
    }
}
