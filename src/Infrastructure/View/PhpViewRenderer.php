<?php

declare(strict_types=1);

namespace EscapeRPG\Framework\Infrastructure\View;

final class PhpViewRenderer
{
    public function __construct(private string $templatesPath)
    {
    }

    public function render(string $template, array $data = []): string
    {
        $templatePath = $this->templatesPath . '/' . $template . '.php';

        if (!is_file($templatePath)) {
            throw new \RuntimeException(sprintf('Template "%s" not found.', $template));
        }

        extract($data, EXTR_SKIP);

        ob_start();
        require $templatePath;

        return (string) ob_get_clean();
    }
}
