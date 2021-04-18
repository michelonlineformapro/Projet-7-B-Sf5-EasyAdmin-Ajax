<?php

namespace App\Controller\Admin;

use App\Controller\AnnoncesController;
use App\Controller\SecurityController;
use App\Entity\Annonces;
use App\Entity\Categories;
use App\Entity\Regions;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(AnnoncesCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            //LOGO
            ->setTitle('<img src="img/sf_logo.png" />');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('TABLEAU DE BORD', 'fa fa-home'),

            MenuItem::section('Annonces'),
            MenuItem::linkToCrud('Annonces', 'fa fa-user', Annonces::class),

            MenuItem::section('Catégories'),
            MenuItem::linkToCrud('Catégories', 'fa fa-user', Categories::class),

            MenuItem::section('Régions'),
            MenuItem::linkToCrud('Régions', 'fa fa-user', Regions::class),

            MenuItem::section('Utilisateurs'),
            MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', User::class),
            ];
    }
}
