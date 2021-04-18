<?php

namespace App\Controller;

use App\Entity\PropertySearch;
use App\Form\PropertySearchType;
use App\Repository\AnnoncesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RechercheController extends AbstractController
{
    /**
     * @Route("/recherche", name="recherche")
     */
    public function index(AnnoncesRepository $annoncesRepository, Request $request, PaginatorInterface $paginator): Response
    {
        //Recherche par prix et catégorie et region
        $search = new PropertySearch();

        $formSearch = $this->createForm(PropertySearchType::class,$search);
        $formSearch->handleRequest($request);

        $pagination = $paginator->paginate(
            $annoncesRepository->rechercheForm($search),
            $request->query->getInt('page',1),3
        );


        return $this->render('recherche/index.html.twig', [
            'controller_name' => 'RechercheController',
            'pagination' => $pagination,
            'form_search' => $formSearch->createView()
        ]);
    }
}
