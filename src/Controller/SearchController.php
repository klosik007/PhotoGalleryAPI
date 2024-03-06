<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class SearchController extends AbstractController
{
    #[Route('/api/search', name: 'search_stuff', methods: ['POST'])]
    public function searchStuff(Request $request): JsonResponse
    {
        // $requestBody = json_decode($request->getContent(), true);

        // TODO: call up to database

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/SearchController.php',
        ]);
    }

    #[Route('/api/search/featuredposts', name: 'search_stuff', methods: ['GET'])]
    public function getFeaturedPosts(): JsonResponse
    {
        // TODO: call up to database

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/SearchController.php',
        ]);
    }
}
