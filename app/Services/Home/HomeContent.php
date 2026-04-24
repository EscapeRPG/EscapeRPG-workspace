<?php

namespace App\Services\Home;

class HomeContent
{
    public function bienvenue(): array
    {
        return $this->load('bienvenue');
    }

    public function aventures(): array
    {
        return $this->load('aventures');
    }

    public function regles(): array
    {
        return $this->load('regles');
    }

    public function liens(): array
    {
        return $this->load('liens');
    }

    private function load(string $name): array
    {
        $path = BASE_PATH . '/app/Content/Home/' . $name . '.php';

        return file_exists($path) ? require $path : [];
    }
}
