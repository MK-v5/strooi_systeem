<?php

declare(strict_types=1);

namespace App\controllers;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7\HttpFactory;
use Nyholm\Psr7\Factory\Psr17Factory;

class homeController
{
    public function index(): ResponseInterface
    {
        $factory = new Psr17Factory;

        $stream = $factory->createStream("HomePage");

        $response = $factory->createResponse();

        $response = $response->withBody($stream);

        return $response;
    }
}