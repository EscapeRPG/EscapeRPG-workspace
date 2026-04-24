<?php

declare(strict_types=1);

namespace EscapeRPG\Framework\Http;

final class RedirectResponse extends Response
{
    public function __construct(string $location, int $statusCode = 302, array $headers = [])
    {
        $headers['Location'] = $location;

        parent::__construct('', $statusCode, $headers);
    }
}
