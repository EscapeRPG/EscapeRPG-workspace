<?php

namespace App\Controllers;

use App\Core\Controller;

class ErrorController extends Controller
{
    public function __construct()
    {
    }

    public function show(int $status = 404, ?string $message = null): never
    {
        $status = $this->validStatus($status);

        http_response_code($status);
        $this->view('errors/show', [
            'title' => 'EscapeRPG - Erreur ' . $status,
            'showGlobalHeader' => false,
            'status' => $status,
            'errorTitle' => $this->titleForStatus($status),
            'message' => $message ?: $this->messageForStatus($status),
        ]);

        exit;
    }

    private function validStatus(int $status): int
    {
        return $status >= 400 && $status <= 599 ? $status : 500;
    }

    private function titleForStatus(int $status): string
    {
        return match ($status) {
            403 => 'Accès refusé',
            404 => 'Page introuvable',
            500 => 'Erreur interne',
            default => 'Erreur ' . $status,
        };
    }

    private function messageForStatus(int $status): string
    {
        return match ($status) {
            403 => 'Vous n’avez pas accès à cette partie de l’aventure.',
            404 => 'Le chemin que vous tentez d’emprunter ne mène à aucune page connue.',
            500 => 'Le Narrateur a perdu le fil. La scène demandée ne peut pas être affichée pour le moment.',
            default => 'Un événement inattendu empêche d’afficher cette page.',
        };
    }
}
