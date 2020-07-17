<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{


    public function index(Request $req): Response
    {
        $resp = new Response();
        $resp->setContent(json_encode(
            [
                "recebido" => $req->get('nome'),
                "IP" => $req->getClientIp()
            ]
        ));
        $resp->setStatusCode(200);

        return $resp;
    }
}
