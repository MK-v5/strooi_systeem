<?php

declare(strict_types=1);

namespace App\controllers;

use Framework\Controller\abstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


class productController extends abstractController
{
    public function index(): ResponseInterface
    {
        return $this->render("/product/index");    
    }

    public function show(ServerRequestInterface $request, array $args): ResponseInterface
    {
        return $this->render("/product/show", ["id" => $args["id"]]);
    }
}