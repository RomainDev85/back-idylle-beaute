<?php

declare(strict_types=1);

namespace App\Controller\Front;

use App\Repository\CategoryRepository;
use App\Repository\ServiceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    public function __construct(
        private readonly ServiceRepository $serviceRepository,
        private readonly CategoryRepository $categoryRepository,
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

        $services = $this->serviceRepository->findBy(['category' => $category]);

        return $this->render('category.html.twig', [
            'services' => $services,
            'category' => $category,
        ]);
    }
}
