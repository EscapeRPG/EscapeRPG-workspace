<?php

declare(strict_types=1);

namespace EscapeRPG\Framework\Controller;

use EscapeRPG\Framework\Http\RedirectResponse;
use EscapeRPG\Framework\Http\Response;
use EscapeRPG\Framework\Infrastructure\View\PhpViewRenderer;

abstract class AbstractController
{
    public function __construct(protected PhpViewRenderer $view)
    {
    }

    protected function render(string $template, array $data = [], int $statusCode = 200): Response
    {
        return Response::html(
            $this->view->render($template, $data),
            $statusCode
        );
    }

    protected function redirect(string $location): RedirectResponse
    {
        return new RedirectResponse($location);
    }
}
