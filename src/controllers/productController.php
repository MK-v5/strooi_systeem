<?php

declare(strict_types=1);

namespace App\controllers;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class productController
{
    public function index(): ResponseInterface
    {
        $stream = Utils::streamFor("List of products");
        
        $response = new Response;

        $response = $response->withBody($stream);

        return $response;
    }

    public function show(ServerRequestInterface $request, array $args): ResponseInterface
    {
        $id = $args["id"];

        $stream = Utils::streamFor("Product with ID $id");
        
        $response = new Response;

        $response = $response->withBody($stream);

        return $response;
    }
}