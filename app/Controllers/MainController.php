<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\HomeLinksRepository;
use App\Services\Home\HomeContent;

class MainController extends Controller
{
    public function index(): void
    {
        $content = new HomeContent();
        $linksRepository = new HomeLinksRepository($this->db);

        $this->view('home/index', [
            'title' => 'EscapeRPG - Accueil',
            'showGlobalHeader' => false,
            'bienvenue' => $content->bienvenue(),
            'aventures' => $content->aventures(),
            'regles' => $content->regles(),
            'liens' => $content->liens(),
            'members' => $linksRepository->getMembers(),
            'supporters' => $linksRepository->getSupporters(),
        ]);
    }
}
