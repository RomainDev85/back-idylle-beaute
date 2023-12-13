<?php

declare(strict_types=1);

namespace App\Controller\Front;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    public function __construct(
        private readonly CategoryRepository $categoryRepository,
    )
    {
    }


    #[Route('/', 'app_front_homepage')]
    public function home(): Response
    {

        $categories = $this->categoryRepository->findAll();

        return $this->render('homepage.html.twig', [
            'categories' => $categories,
        ]);
    }
}
