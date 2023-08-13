<?php

declare(strict_types=1);

namespace App\Controller\Store\Action;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CreateStoreAction extends AbstractController
{
    #[Route('/api/stores/new', name: 'app_store_create', methods: ['POST'])]
    public function __invoke(): JsonResponse
    {
        return new JsonResponse([
            "success" => true,
            "message" => "New Store added",
            "store" => [
                "name" => "Idylle Beauté - L'Aiguillon sur vie"
            ]
        ]);
    }
}