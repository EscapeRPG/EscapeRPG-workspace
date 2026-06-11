<?php

namespace App\Services\Adventures\Scenarios\Gaea1;

use App\Core\Request;

class Gaea1Avatar
{
    /**
     * @return array<string, int>
     */
    public function fromRequest(Request $request): array
    {
        return [
            'visage' => $this->boundedInt($request, 'visage', 11, 11, 106),
            'oreilles' => $this->boundedInt($request, 'oreilles', 11, 11, 106),
            'cheveux' => $this->boundedInt($request, 'cheveux', 1, 1, 16),
            'couleurcheveux' => $this->boundedInt($request, 'couleurcheveux', 1, 1, 12),
            'sourcils' => $this->boundedInt($request, 'sourcils', 1, 1, 14),
            'yeux' => $this->boundedInt($request, 'yeux', 1, 1, 20),
            'couleuryeux' => $this->boundedInt($request, 'couleuryeux', 1, 1, 12),
            'nez' => $this->boundedInt($request, 'nez', 11, 11, 106),
            'bouche' => $this->boundedInt($request, 'bouche', 1, 1, 15),
            'couleurbouche' => $this->boundedInt($request, 'couleurbouche', 1, 1, 12),
            'pilosite' => $this->boundedInt($request, 'pilosite', 1, 1, 17),
            'couleurpilosite' => $this->boundedInt($request, 'couleurpilosite', 1, 1, 12),
            'accessoire' => $this->boundedInt($request, 'accessoire', 1, 1, 14),
        ];
    }

    /**
     * @param array<string, mixed> $avatar
     * @return array<int, array{src: string, alt: string}>
     */
    public function layers(array $avatar): array
    {
        $cheveux = (int)($avatar['cheveux'] ?? 1);
        $couleurCheveux = (int)($avatar['couleurcheveux'] ?? 1);

        return [
            $this->layer('cheveux arrière', 'cheveuxbackend' . $cheveux . '-' . $couleurCheveux . '.png'),
            $this->layer('visage', 'visage' . (int)($avatar['visage'] ?? 11) . '.png'),
            $this->layer('bouche', 'bouche' . (int)($avatar['bouche'] ?? 1) . '-' . (int)($avatar['couleurbouche'] ?? 1) . '.png'),
            $this->layer('yeux', 'yeux' . (int)($avatar['yeux'] ?? 1) . '-' . (int)($avatar['couleuryeux'] ?? 1) . '.png'),
            $this->layer('nez', 'nez' . (int)($avatar['nez'] ?? 11) . '.png'),
            $this->layer('cheveux fond', 'cheveuxback' . $cheveux . '-' . $couleurCheveux . '.png'),
            $this->layer('pilosité', 'pilosite' . (int)($avatar['pilosite'] ?? 1) . '-' . (int)($avatar['couleurpilosite'] ?? 1) . '.png'),
            $this->layer('oreilles', 'oreilles' . (int)($avatar['oreilles'] ?? 11) . '.png'),
            $this->layer('sourcils', 'sourcils' . (int)($avatar['sourcils'] ?? 1) . '.png'),
            $this->layer('accessoire', 'accessoire' . (int)($avatar['accessoire'] ?? 1) . '.png'),
            $this->layer('cheveux', 'cheveux' . $cheveux . '-' . $couleurCheveux . '.png'),
        ];
    }

    /**
     * @param array<int, mixed> $layers
     */
    public function html(array $layers, string $image = '', bool $withSuit = false, bool $feminine = false): string
    {
        $html = '';
        if ($image !== '') {
            $html .= '<img src="' . asset($image) . '" alt="avatar">';
        } else {
            $html .= $this->layersHtml($layers);
        }

        if ($withSuit) {
            $suit = $this->layer('combinaison', ($feminine ? 'combinaisonfemme' : 'combinaisonhomme') . '.png');
            $html .= '<img src="' . asset($suit['src']) . '" alt="' . e($suit['alt']) . '">';
        }

        return $html;
    }

    /**
     * @param array<string, mixed> $avatar
     */
    public function image(array $avatar): string
    {
        $hash = substr(hash('sha256', json_encode($avatar, JSON_THROW_ON_ERROR)), 0, 24);
        $relativePath = 'assets/img/gaea1/avatar/generated/avatar-' . $hash . '.jpg';
        $absolutePath = $this->publicPath($relativePath);

        if (is_file($absolutePath)) {
            return $relativePath;
        }

        $directory = dirname($absolutePath);
        if (!is_dir($directory)) {
            mkdir($directory, 0775, true);
        }

        $canvas = $this->createBaseCanvas();
        foreach ($this->layers($avatar) as $layer) {
            $this->copyPngLayer($canvas, $this->publicPath($layer['src']));
        }

        imagejpeg($canvas, $absolutePath, 92);
        imagedestroy($canvas);

        return $relativePath;
    }

    /**
     * @param array<int, mixed> $layers
     */
    private function layersHtml(array $layers): string
    {
        if ($layers === []) {
            $layers = $this->layers([]);
        }

        $html = '';
        foreach ($layers as $layer) {
            if (!is_array($layer)) {
                continue;
            }

            $src = (string)($layer['src'] ?? '');
            if ($src === '') {
                continue;
            }

            $html .= '<img src="' . asset($src) . '" alt="' . e((string)($layer['alt'] ?? '')) . '">';
        }

        return $html;
    }

    /**
     * @return resource|\GdImage
     */
    private function createBaseCanvas()
    {
        $basePath = $this->publicPath('assets/img/gaea1/avatar/fond.png');
        $base = imagecreatefrompng($basePath);
        if ($base === false) {
            throw new \RuntimeException('Unable to read GAEA-1 avatar background.');
        }

        $width = imagesx($base);
        $height = imagesy($base);
        $canvas = imagecreatetruecolor($width, $height);
        imagefill($canvas, 0, 0, imagecolorallocate($canvas, 255, 255, 255));
        imagecopy($canvas, $base, 0, 0, 0, 0, $width, $height);
        imagedestroy($base);

        return $canvas;
    }

    /**
     * @param resource|\GdImage $canvas
     */
    private function copyPngLayer($canvas, string $path): void
    {
        if (!is_file($path)) {
            return;
        }

        $layer = imagecreatefrompng($path);
        if ($layer === false) {
            return;
        }

        imagecopy($canvas, $layer, 0, 0, 0, 0, imagesx($canvas), imagesy($canvas));
        imagedestroy($layer);
    }

    private function boundedInt(Request $request, string $key, int $default, int $min, int $max): int
    {
        $value = (int)$request->post($key, $default);

        return max($min, min($max, $value));
    }

    /**
     * @return array{src: string, alt: string}
     */
    private function layer(string $alt, string $file): array
    {
        return [
            'src' => 'assets/img/gaea1/avatar/' . $file,
            'alt' => $alt,
        ];
    }

    private function publicPath(string $relativePath): string
    {
        return dirname(__DIR__, 5) . '/public/' . ltrim($relativePath, '/\\');
    }
}
