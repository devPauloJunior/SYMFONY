<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use function Symfony\Component\String\u;

class DefaultController extends AbstractController
{
    #[Route('/default', name: 'app_default')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DefaultController.php',
        ]);
    }

    #[Route('/default2/{name}', name: 'app_default2')]
    public function index2(string $name): JsonResponse
    {
        return $this->json([
            'message' => "Welcome $name !",
            'path' => 'src/Controller/DefaultController.php',
        ]);
    }

    #[Route('/animal/{slug}')]
    public function animal(string $slug=null): Response {
        $newSlug = str_replace('-', ' ', $slug);
        $newSlug = u($newSlug)->title(allWords:true);
        return new Response(content: "É um(a): $newSlug ");
    }


}
