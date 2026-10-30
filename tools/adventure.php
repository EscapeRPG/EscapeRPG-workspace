<?php

require __DIR__ . '/adventure-bootstrap.php';

use App\Services\Adventures\Authoring\AdventureScaffolder;

$command = $argv[1] ?? '--help';
if (in_array($command, ['--help', '-h'], true)) {
    echo "Usage :\n  php tools/adventure.php new:scenario slug \"Titre\"\n  php tools/adventure.php new:scene slug scene \"Titre de scène\"\n  php tools/adventure.php map slug\n\nCréation : aucun fichier existant écrasé. Une carte peut être régénérée.\n";
    exit(0);
}
try {
    $scaffolder = new AdventureScaffolder(BASE_PATH);
    $files = match ($command) {
        'new:scenario' => count($argv) === 4 ? $scaffolder->scenario($argv[2], $argv[3]) : throw new InvalidArgumentException('Usage : new:scenario slug "Titre"'),
        'new:scene' => count($argv) === 5 ? $scaffolder->scene($argv[2], $argv[3], $argv[4]) : throw new InvalidArgumentException('Usage : new:scene slug scene "Titre"'),
        'map' => count($argv) === 3 ? [(new \App\Services\Adventures\Authoring\AdventureMap(BASE_PATH))->generate($argv[2])] : throw new InvalidArgumentException('Usage : map slug'),
        default => throw new InvalidArgumentException('Commande inconnue. Utiliser --help.'),
    };
    foreach ($files as $file) {
        echo str_replace(BASE_PATH . '/', '', $file), PHP_EOL;
    }
    if ($command !== 'map') {
        echo "Structure créée sans texte narratif. Ajouter les textes et brancher les transitions avant de jouer.\n";
        echo "Vérifier : php tools/validate_adventure.php ", $argv[2], PHP_EOL;
    }
} catch (Throwable $exception) {
    fwrite(STDERR, $exception->getMessage() . PHP_EOL);
    exit(1);
}
