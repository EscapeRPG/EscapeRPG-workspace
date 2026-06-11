<?php

namespace App\Services\Adventures\Scenarios\Gaea1\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Gaea1\Gaea1Avatar;
use App\Services\Adventures\Support\UserInputNormalizer;

class Gaea1SceneHandler implements AdventureSceneHandler
{
    use UserInputNormalizer;

    private Gaea1Avatar $avatar;

    /**
     * @param array<string, mixed> $actions
     */
    public function __construct(
        private readonly string $scene,
        private readonly string $defaultVariant = 'default',
        private readonly array $actions = [],
    ) {
        $this->avatar = new Gaea1Avatar();
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ($isLandingPage && $this->scene === 'index') {
            return 'landing';
        }

        return (string) $state->get($this->scene . '_variant', $this->defaultVariant);
    }

    public function viewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array
    {
        $avatarLayers = $this->avatarLayers($state);
        $avatarImage = $this->avatarImage($state);

        return [
            'avatarHtml' => $this->avatar->html($avatarLayers, $avatarImage),
            'avatarNavHtml' => $this->avatar->html($avatarLayers, $avatarImage, (bool) $state->get('combinaison', false), (bool) $state->get('feminin', false)),
            'displayName' => $this->displayName($state),
            'rank' => $this->rank($state),
        ];
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        $definition = $this->actions[$action] ?? null;
        if ($definition === null) {
            return new AdventureActionResult(nextScene: $this->scene);
        }

        $nextScene = (string) ($definition['next_scene'] ?? $this->scene);
        $stateChanges = (array) ($definition['state'] ?? []);
        $nextVariant = $definition['variant'] ?? null;
        if (is_string($nextVariant) && $nextVariant !== '') {
            $stateChanges[$nextScene . '_variant'] = $nextVariant;
        }

        return new AdventureActionResult(
            nextScene: $nextScene,
            stateChanges: $stateChanges,
            achievements: (array) ($definition['achievements'] ?? []),
        );
    }

    protected function submitAvatar(Request $request): AdventureActionResult
    {
        $avatar = $this->avatar->fromRequest($request);

        return new AdventureActionResult(
            nextScene: 'index',
            stateChanges: [
                'index_variant' => 'identity',
                'avatar_created' => true,
                'avatar' => $avatar,
                'avatar_layers' => $this->avatar->layers($avatar),
                'avatar_image' => $this->avatar->image($avatar),
            ],
        );
    }

    protected function submitIdentity(Request $request): AdventureActionResult
    {
        $lastName = trim((string) $request->post('pjnom', ''));
        $firstName = $this->formatFirstName(trim((string) $request->post('pjprenom', '')));

        return new AdventureActionResult(
            nextScene: 'index',
            stateChanges: [
                'index_variant' => 'gender',
                'pjnom' => $lastName,
                'pjprenom' => $firstName,
            ],
        );
    }

    protected function chooseGender(bool $feminine): AdventureActionResult
    {
        return new AdventureActionResult(
            nextScene: 'index',
            stateChanges: [
                'index_variant' => 'ready',
                'genre' => true,
                'feminin' => $feminine,
            ],
            achievements: [['scenario' => 'gaea1', 'name' => 'personnage']],
        );
    }

    protected function formatFirstName(string $value): string
    {
        $parts = array_map(
            static fn (string $part): string => mb_convert_case($part, MB_CASE_TITLE, 'UTF-8'),
            array_filter(explode('-', $value), static fn (string $part): bool => $part !== '')
        );

        return implode('-', $parts);
    }

    private function displayName(AdventureState $state): string
    {
        $firstName = trim((string) $state->get('pjprenom', ''));
        $lastName = trim((string) $state->get('pjnom', ''));
        if ($firstName === '' && $lastName === '') {
            return '';
        }

        return trim($firstName . ' ' . mb_strtoupper($lastName, 'UTF-8'));
    }

    private function rank(AdventureState $state): string
    {
        if (!(bool) $state->get('genre', false)) {
            return '';
        }

        return (bool) $state->get('feminin', false) ? 'Commandante' : 'Commandant';
    }

    /**
     * @return array<int, mixed>
     */
    private function avatarLayers(AdventureState $state): array
    {
        $layers = $state->get('avatar_layers', []);
        if (is_array($layers) && $layers !== []) {
            return $layers;
        }

        return $this->avatar->layers((array) $state->get('avatar', []));
    }

    private function avatarImage(AdventureState $state): string
    {
        $image = (string) $state->get('avatar_image', '');
        if ($image !== '') {
            return $image;
        }

        if (!(bool) $state->get('avatar_created', false)) {
            return '';
        }

        return $this->avatar->image((array) $state->get('avatar', []));
    }
}
