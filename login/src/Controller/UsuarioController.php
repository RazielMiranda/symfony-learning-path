<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="web_usuario_")
 */
class UsuarioController
{

    /**
    * @Route("/", methods={"GET"})
    */
    public function index(): Response
    {
        return new Response("IMplementar form de cadastro");
    }

    /**
    * @Route("/salvar", methods={"POST"})
    */
    public function salvar(): Response
    {
        return new Response("Implementar gravação no BD");
    }

}
