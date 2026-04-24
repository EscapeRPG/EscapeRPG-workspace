<?php

declare(strict_types=1);

namespace EscapeRPG\Framework\Http;

class Response
{
    public function __construct(
        protected string $content = '',
        protected int $statusCode = 200,
        protected array $headers = []
    ) {
    }

    public static function html(string $content, int $statusCode = 200, array $headers = []): self
    {
        $headers['Content-Type'] = 'text/html; charset=UTF-8';

        return new self($content, $statusCode, $headers);
    }

    public static function json(array $data, int $statusCode = 200, array $headers = []): self
    {
        $headers['Content-Type'] = 'application/json; charset=UTF-8';

        return new self((string) json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT), $statusCode, $headers);
    }

    public function send(): void
    {
        http_response_code($this->statusCode);

        foreach ($this->headers as $name => $value) {
            header($name . ': ' . $value);
        }

        echo $this->content;
    }
}
