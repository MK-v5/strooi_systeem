<?php

declare(strict_types=1);

namespace App\controllers;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseFactoryInterface;


class productController
{
    public function __construct(private ResponseFactoryInterface $factory)
    {
    }

    public function index(): ResponseInterface
    {
        /** @disregard P013 Undefined method */ $stream = $this->factory->createStream("List of products");
        
        $response = $this->factory->createResponse(200);

        $response = $response->withBody($stream);

        return $response;
    }

    public function show(ServerRequestInterface $request, array $args): ResponseInterface
    {
        $id = $args["id"];

        /** @disregard P013 Undefined method */ $stream = $this->factory->createStream("Product with ID $id");
        
        $response = $this->factory->createResponse(200);

        $response = $response->withBody($stream);

        return $response;
    }
}