<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/", name="web_usuario_")
 */
class UsuarioController extends AbstractController
{

    /**
    * @Route("/", methods={"GET"}, name="index")
    */
    public function index(): Response
    {
        return $this->render("usuario/form.html.twig");
    }

    /**
    * @Route("/salvar", methods={"POST"}, name="salvar")
    */
    public function salvar(): Response
    {
        return $this->render("usuario/sucesso.html.twig", ['fulano' => 'raziel']);
    }

}
