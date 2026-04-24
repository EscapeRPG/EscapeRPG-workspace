<?php

namespace App\Core;

use PDO;

class Controller
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::get();
    }

    protected function view(string $path, array $data = [], string $layout = 'main'): void
    {
        extract($data);

        $viewPath = $path;
        $currentPath = '/' . ltrim(
            rawurldecode(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/'),
            '/'
        );
        if ($currentPath === '') {
            $currentPath = '/';
        }

        ob_start();
        require __DIR__ . '/../../views/' . $path . '.php';
        $content = ob_get_clean();

        require __DIR__ . '/../../views/layouts/' . $layout . '.php';
    }
}
