<?php

declare(strict_types=1);

namespace App\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseFactoryInterface;

class homeController
{
    public function __construct(private ResponseFactoryInterface $factory)
    {
    }

    public function index(): ResponseInterface
    {

        /** @disregard P013 Undefined method */ $stream = $this->factory->createStream("HomePage");

        $response = $this->factory->createResponse(200);

        $response = $response->withBody($stream);

        return $response;
    }
}