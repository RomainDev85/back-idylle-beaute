<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Service;
use App\Entity\SubCategory;
use App\Entity\SubService;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private TranslatorInterface $translator,
    )
    {
    }

    #[Route('/admin', name: 'app_admin_index')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(CategoryCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle($this->translator->trans('app.ui.business.name'));
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard($this->translator->trans('app.ui.admin.home.label'), 'fa fa-home'),
            MenuItem::linkToCrud($this->translator->trans('app.ui.admin.category.label'), 'fa-solid fa-list', Category::class),
            MenuItem::linkToCrud($this->translator->trans('app.ui.admin.service.label'), 'fa-solid fa-list', Service::class),
            MenuItem::subMenu($this->translator->trans('app.ui.admin.sub_category.label'), 'fa-solid fa-list')->setSubItems([
                MenuItem::linkToCrud($this->translator->trans('app.ui.admin.list'), 'fa-solid fa-list', SubCategory::class),
                MenuItem::linkToCrud($this->translator->trans('app.ui.admin.sub_service.label'), 'fa-solid fa-list', SubService::class),
            ]),
            MenuItem::linkToLogout($this->translator->trans('app.ui.admin.logout'), 'fa-solid fa-power-off'),
        ];
    }
}
