<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\HomeLinksRepository;
use App\Services\Home\HomeAdventureCatalog;
use App\Services\Home\HomePageContent;

/**
 * Contrôleur de la page d'accueil.
 */
class MainController extends Controller
{
    /**
     * Construit et rend le contenu de la home.
     */
    public function index(): void
    {
        $content = new HomePageContent();
        $catalog = new HomeAdventureCatalog();
        $linksRepository = new HomeLinksRepository($this->db);

        $this->view('home/index', [
            'title' => 'EscapeRPG - Accueil',
            'showGlobalHeader' => false,
            'bienvenue' => $content->bienvenue(),
            'aventures' => $catalog->all(),
            'regles' => $content->regles(),
            'liens' => $content->liens(),
            'members' => $linksRepository->getMembers(),
            'supporters' => $linksRepository->getSupporters(),
        ]);
    }
}
