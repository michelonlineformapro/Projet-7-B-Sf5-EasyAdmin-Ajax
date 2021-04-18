<?php

namespace App\Controller;

use App\Entity\Annonces;
use App\Entity\PropertySearch;
use App\Form\AnnoncesType;
use App\Form\PropertySearchType;
use App\Repository\AnnoncesRepository;
use App\Repository\CategoriesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @Route("/annonces")
 */
class AnnoncesController extends AbstractController
{
    /**
     * @Route("/", name="annonces_index", methods={"GET"})
     */
    public function index(AnnoncesRepository $annoncesRepository, Request $request, PaginatorInterface $paginator, CategoriesRepository $categoriesRepository): Response
    {
        //Lister les catégorie
        $categories = $categoriesRepository->findAll();
        //Recherche par prix et catégorie et region
        $search = new PropertySearch();

        $formSearch = $this->createForm(PropertySearchType::class,$search);
        $formSearch->handleRequest($request);

        $filtres = $request->get('categories');

        $pagination = $paginator->paginate(
            $annonce = $annoncesRepository->recherche($filtres),
            $request->query->getInt('page',1),3,
        );



        $page = (int)$request->query->getInt("page", 1);

        //On recuperers les filtres

        if($request->get('ajax')){
            return new JsonResponse([
                'content' => $this->renderView('annonces/_content.html.twig', [
                    'pagination' => $pagination,
                    'categories' => $categories,
                    'page' => $page,
                    'form_search' => $formSearch->createView(),
                    'annonce' => $annoncesRepository->findAll(),
                ])
            ]);
        }


        return $this->render('annonces/index.html.twig', [
            'pagination' => $pagination,
            'categories' => $categories,
            'page' => $page,
            'form_search' => $formSearch->createView()
        ]);
    }

    /**
     * @Route("/annonces/{slug}/{id}", name="annonces_show", methods={"GET"})
     */
    public function show(Annonces $annonce): Response
    {
        return $this->render('annonces/show.html.twig', [
            'annonce' => $annonce,
        ]);
    }

}
