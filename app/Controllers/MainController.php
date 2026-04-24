<?php

namespace App\Controllers;

use App\Core\Controller;

class MainController extends Controller
{
    public function index(): void
    {
        $this->view('home/index', [
            'title' => 'EscapeRPG - Accueil',
        ]);
    }
}
