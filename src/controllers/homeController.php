<?php

declare(strict_types=1);

namespace App\controllers;

use Framework\Controller\abstractController;
use Psr\Http\Message\ResponseInterface;

class homeController extends abstractController
{

    public function __construct(private \DateTime $dt)
    {
    }

    public function index(): ResponseInterface
    {
        return $this->render("/home/index",  ["name" => $this->dt->format("l")]);
    }
}