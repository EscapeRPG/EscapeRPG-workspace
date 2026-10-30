<?php

require __DIR__ . '/adventure-bootstrap.php';

try {
    if (count($argv) !== 2) throw new InvalidArgumentException('Usage : php tools/adventure-map.php slug');
    echo (new App\Services\Adventures\Authoring\AdventureMap(BASE_PATH))->generate($argv[1]), PHP_EOL;
} catch (Throwable $exception) {
    fwrite(STDERR, $exception->getMessage() . PHP_EOL);
    exit(1);
}
