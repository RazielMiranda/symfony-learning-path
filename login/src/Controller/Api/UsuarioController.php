<?php

namespace App\Controller\Api;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/api/v1", name="api_usuario_")
 */
class UsuarioController
{
    /**
     * @Route("/lista", methods={"GET"}, name="lista")
     */
    public function lista(): JsonResponse
    {
        return new JsonResponse(["Implementar lista na API", 404]);
    }

    /**
     * @Route("/cadastra", methods=("POST"), name="cadastra")
     */
    // public function cadastra(): JsonResponse
    // {
    //     return new JsonResponse(["Implentar cadastro na API", 404]);
    // }

}