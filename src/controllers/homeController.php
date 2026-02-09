<?php

declare(strict_types=1);

namespace App\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Framework\Template\renderer;
use Framework\Template\rendererInterface;

class homeController
{
    public function __construct(private ResponseFactoryInterface $factory,
                                private rendererInterface $renderer)
    {
    }

    public function index(): ResponseInterface
    {
        $contents = $this->renderer->render("/home/index",  ["name" => "<em>Dave</em>"]);

        /** @disregard P013 Undefined method */ $stream = $this->factory->createStream($contents);

        $response = $this->factory->createResponse(200);

        $response = $response->withBody($stream);

        return $response;
    }
}