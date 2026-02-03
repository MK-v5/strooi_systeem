<?php

declare(strict_types=1);

namespace App\controllers;

use GuzzleHttp\Psr7\Response as GuzzleResponse;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\ResponseInterface;

class homeController
{
    public function index(): ResponseInterface
    {
        $stream = Utils::streamFor("Homepage");
        
        $response = new GuzzleResponse;

        $response = $response->withBody($stream);

        return $response;
    }
}