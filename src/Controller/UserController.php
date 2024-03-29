<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Serialization\SerializerImproved;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    use SerializerImproved;

    #[Route('/api/user/{nickname}', name: 'app_user', methods: ['GET'])]
    public function getUserByNickname(UserRepository $userRepo, string $nickname): JsonResponse
    {
        $this->improveSerialization();

        $user = $userRepo->findOneBy(['nickname' => $nickname]);

        $res = $this->serializer->serialize($user, 'json');

        return $this->json(json_decode($res));
    }
}
