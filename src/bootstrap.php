<?php

declare(strict_types=1);

use GuzzleHttp\Psr7\ServerRequest;
use HttpSoft\Emitter\SapiEmitter;
use League\Route\Router;
use App\controllers\homeController;
use App\controllers\productController;
use Nyholm\Psr7\Factory\Psr17Factory;
use GuzzleHttp\Psr7\HttpFactory;
use Psr\Http\Message\ResponseFactoryInterface;
use League\Route\Strategy\ApplicationStrategy;

ini_set("display_errors", 1);

require dirname(__DIR__) . "/vendor/autoload.php";

$request = ServerRequest::fromGlobals();

$container = new DI\Container([
    ResponseFactoryInterface::class => DI\create(HttpFactory::class)
]);

$controller = $container->get(homeController::class);

$router = new Router;

$strategy = new ApplicationStrategy;
$strategy->setContainer($container);
$router->setStrategy($strategy);

$router->get("/", [homeController::class, "index"]);

$router->get("/products", [productController::class, "index"]);

$router->get("/product/{id:number}",  [productController::class, "show"]);

$response = $router->dispatch($request);

$emitter = new SapiEmitter();

$emitter->emit($response);