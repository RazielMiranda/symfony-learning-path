<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController
{
    public function index(Request $req): Response
    {
        $resp = new Response();
        $resp->setContent(json_encode(
            [
                "recebido" => $req->get('nome')
            ]
        ));
        $resp->setStatusCode(200);

        return $resp;
    }
}
