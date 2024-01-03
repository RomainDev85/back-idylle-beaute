<?php

declare(strict_types=1);

namespace App\Controller\Front;

use App\Entity\SubCategory;
use App\Repository\CategoryRepository;
use App\Repository\ServiceRepository;
use App\Repository\SubCategoryRepository;
use App\Repository\SubServiceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    public function __construct(
        private readonly ServiceRepository $serviceRepository,
        private readonly CategoryRepository $categoryRepository,
        private readonly SubCategoryRepository $subCategoryRepository,
        private readonly SubServiceRepository $subServiceRepository,
    )
    {
    }


    #[Route('/categorie/{slug}', 'app_front_category')]
    public function category(string $slug): Response
    {

        $category = $this->categoryRepository->findOneBy(['url' => $slug]);

        if (!$category) {
            return $this->redirectToRoute('app_front_homepage');
        }

        $subCategories = $this->subCategoryRepository->findBy(['category' => $category]);
        $services = $this->serviceRepository->findBy(['category' => $category]);

        return $this->render('category.html.twig', [
            'services' => $services,
            'category' => $category,
            'subCategories' => $subCategories
        ]);
    }
}
