<?php

namespace App\Core;

class Response
{
    public function redirect(string $path, int $status = 302): never
    {
        header('Location: ' . url($path), true, $status);
        exit;
    }

    public function back(int $status = 302): never
    {
        $target = $_SERVER['HTTP_REFERER'] ?? '/';
        header('Location: ' . $target, true, $status);
        exit;
    }

    public function json(array $data, int $status = 200): never
    {
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit;
    }
}
