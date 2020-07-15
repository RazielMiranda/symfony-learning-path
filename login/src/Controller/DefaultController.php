<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function index()
    {
        //echo "oi";
        return new Response("Roi",200);
    }
}
