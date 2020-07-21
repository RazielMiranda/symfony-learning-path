<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Usuario;

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
    public function salvar(Request $res): Response
    {
        $data = $res->request->all();

        $usuario = new Usuario;
        $usuario->setNome($data['nome']);
        $usuario->setEmail($data['email']);

        dump($usuario);

        // dump($res->res->all());
        return $this->render("usuario/sucesso.html.twig", ['fulano' => $data]);
    }

}
