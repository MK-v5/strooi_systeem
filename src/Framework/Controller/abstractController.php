<?php

declare (strict_types=1);

namespace Framework\Controller;

use DI\Attribute\Inject;
use Psr\Http\Message\ResponseInterface;
use Framework\Template\rendererInterface;
use Psr\Http\Message\ResponseFactoryInterface;

abstract class abstractController
{
    #[Inject]
    private ResponseFactoryInterface $factory;

    #[Inject]
    private rendererInterface $renderer;

    protected function render(string $template, array $data = []): ResponseInterface
    {
        $contents = $this->renderer->render($template, $data);

        /** @disregard P013 Undefined method */ $stream = $this->factory->createStream($contents);
        
        $response = $this->factory->createResponse(200);

        $response = $response->withBody($stream);

        return $response;
    }
}