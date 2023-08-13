<?php

declare(strict_types=1);

namespace App\Controller\Store\Action;

use App\Repository\StoreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ListStoreAction extends AbstractController
{
    #[Route('/api/stores', name: "app_store_index", methods: ['GET'])]
    public function __invoke(StoreRepository $storeRepository): JsonResponse
    {
        $stores = $storeRepository->findAll();

        return new JsonResponse([
            "success" => true,
            "message" => "La liste des instituts Idylle Beauté",
            "stores" => $stores,
        ]);
    }
}