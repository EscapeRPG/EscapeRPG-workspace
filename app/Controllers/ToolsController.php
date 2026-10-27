<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\ToolsRepository;

/**
 * Contrôleur de la page d'accueil.
 */
class ToolsController extends Controller
{
    /**
     * Construit et rend le contenu de la page de sondages.
     */
    public function index(?string $sondageSlug = null): void
    {
        $toolsRepository = new ToolsRepository($this->db);
        $propositions = [];

        if ($sondageSlug !== null) {
            $activeSondage = $toolsRepository->getSondage($sondageSlug);
            $decoded = json_decode($activeSondage['propositions'] ?? '[]', true);
            $propositions = is_array($decoded) ? $decoded : [];
            $sondageParticipants = $toolsRepository->getParticipants($sondageSlug);
        }

        $this->view('tools/sondages/sondage', [
            'title' => 'EscapeRPG - Sondage',
            'showGlobalHeader' => false,
            'activeSondage' => $activeSondage ?? null,
            'propositions' => $propositions,
            'participations' => $sondageParticipants ?? null,
        ]);
    }

    public function new(): void
    {
        $this->view('tools/sondages/new', [
            'title' => 'EscapeRPG - Nouveau sondage',
            'showGlobalHeader' => false,
        ]);
    }

    public function vote(string $slug): void
    {
        $repository = new ToolsRepository($this->db);
        $sondage = $repository->getSondage($slug);
        if ($sondage === null) {
            $this->abort(404);
        }
        $target = '/sondage/' . $sondage['slug'];
        $token = $this->request->post('_token');
        if (!is_string($token) || !verify_csrf($token)) {
            $this->session->flash('error', 'Session invalide, veuillez réessayer.');
            $this->response->redirect($target, 303);
        }
        $pseudo = $this->request->post('pseudo');
        $submitted = $this->request->post('reponses');
        $dates = json_decode($sondage['propositions'], true, 512, JSON_THROW_ON_ERROR);
        if (!is_string($pseudo) || trim($pseudo) === '' || mb_strlen(trim($pseudo)) > 50
            || !is_array($submitted) || !is_array($dates) || !$dates || count($submitted) !== count($dates)) {
            $this->session->flash('error', 'Renseigne ton pseudo et une réponse pour chaque date.');
            $this->response->redirect($target, 303);
        }
        $reponses = [];
        foreach ($dates as $date) {
            $value = $submitted[$date] ?? null;
            if (!in_array($value, ['0', '1', '2'], true)) {
                $this->session->flash('error', 'Une des réponses est invalide.');
                $this->response->redirect($target, 303);
            }
            $reponses[$date] = (int) $value;
        }
        $repository->addVote((int) $sondage['id'], trim($pseudo), $reponses);
        $this->session->flash('success', 'Ton vote a été enregistré.');
        $this->response->redirect($target, 303);
    }

    public function create(): void
    {
        $token = $this->request->post('_token');
        if (!is_string($token) || !verify_csrf($token)) {
            $this->session->flash('error', 'Session invalide, veuillez réessayer.');
            $this->response->redirect('/sondage/create');
        }

        $dates = $this->request->post('dates');
        if (!is_array($dates) || $dates === []) {
            $this->session->flash('error', 'Sélectionne au moins une date.');
            $this->response->redirect('/sondage/create');
        }

        foreach ($dates as $date) {
            if (!is_string($date)
                || !preg_match('/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/D', $date, $parts)
                || !checkdate((int) $parts[2], (int) $parts[3], (int) $parts[1])) {
                $this->session->flash('error', 'Une des dates proposées est invalide.');
                $this->response->redirect('/sondage/create');
            }
        }

        $dates = array_values(array_unique($dates));
        sort($dates, SORT_STRING);
        if (strlen(json_encode($dates, JSON_THROW_ON_ERROR)) > 65535) {
            $this->session->flash('error', 'Le nombre de dates proposées est trop important.');
            $this->response->redirect('/sondage/create');
        }

        $titre = $this->request->post('titre') ?? '';

        $repository = new ToolsRepository($this->db);
        $slug = $repository->createSondage($titre, $dates);

        $this->response->redirect('/sondage/' . $slug, 303);
    }
}
