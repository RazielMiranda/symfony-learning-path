<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function index()
    {
        $resp = new Response();
        $resp->setContent("Roi symfony sou o IZ mario!");
        $resp->setStatusCode(200);

        return $resp;
    }
}
