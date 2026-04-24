<?php

declare(strict_types=1);

/** @var string $appName */
/** @var string $content */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($appName, ENT_QUOTES, 'UTF-8') ?></title>
    <style>
        :root {
            color-scheme: light;
            --bg: #f4efe6;
            --panel: #fffaf2;
            --ink: #2c241c;
            --muted: #74685b;
            --line: #d9ccb9;
            --accent: #8c4f2b;
            --accent-soft: #ead7c4;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Georgia, "Times New Roman", serif;
            color: var(--ink);
            background:
                radial-gradient(circle at top left, #fffdf8 0, var(--bg) 42%, #eadfce 100%);
            min-height: 100vh;
        }

        .shell {
            max-width: 980px;
            margin: 0 auto;
            padding: 32px 20px 64px;
        }

        .hero {
            background: linear-gradient(135deg, rgba(255,250,242,0.95), rgba(234,215,196,0.92));
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 12px 32px rgba(44, 36, 28, 0.08);
        }

        h1, h2, h3 {
            margin-top: 0;
            line-height: 1.1;
        }

        p, li {
            line-height: 1.6;
        }

        .grid {
            display: grid;
            gap: 18px;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            margin-top: 22px;
        }

        .card {
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 18px;
        }

        .muted {
            color: var(--muted);
        }

        .code {
            display: block;
            padding: 12px 14px;
            border-radius: 10px;
            background: #2d241d;
            color: #f9f1e6;
            overflow-x: auto;
            font-family: Consolas, monospace;
            font-size: 0.95rem;
        }

        .pill {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            background: var(--accent-soft);
            color: var(--accent);
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <main class="shell">
        <?= $content ?>
    </main>
</body>
</html>
