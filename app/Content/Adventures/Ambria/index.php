<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'landing' => [
            'blocks' => [
                Content::dialogue('Narrateur', 'assets/img/narrateur.png', 'ambria/logan/index#landing'),
            ],
            'actions' => [
                Content::action('NOUVELLE PARTIE.', 'new_game'),
                Content::action('CHARGER UNE PARTIE.', 'load_game'),
            ],
        ],
        'character_select' => [
            'blocks' => [
                Content::dialogue('Narrateur', 'assets/img/narrateur.png', 'ambria/logan/index#character_select'),
                Content::paragraph('Vous pouvez choisir votre personnage ci-dessous.'),
                Content::html(
                    '<div class="cardalign">'
                    . '<div class="card"><div class="cardfond"><h3>Sullivan Mason</h3><div class="cardimage">'
                    . '<button type="submit" form="sullivan-choice" name="action" value="choose_sullivan" class="card-choice"><img src="' . asset('assets/img/ambria/sullivancard.png') . '" alt="Sullivan Mason"></button>'
                    . '</div><p>Le capitaine du Surgisseur des Tempêtes.<br>Réputé sombre et cruel, c\'est un pirate redouté par tous.<br><br>Sullivan est depuis longtemps à la recherche d\'un trésor mythique, se trouvant sur une île mystérieuse...</p></div></div>'
                    . '<form id="sullivan-choice" action="' . url('/aventures/ambria/index') . '" method="post"></form>'
                ),
                Content::html(
                    '<div class="card"><div class="cardfond"><h3>Logan Barthélémy</h3><div class="cardimage">'
                    . '<button type="submit" form="logan-choice" name="action" value="choose_logan" class="card-choice"><img src="' . asset('assets/img/ambria/logancard.png') . '" alt="Logan Barthélémy"></button>'
                    . '</div><p>Un jeune habitant de l\'Île de la Tortue, candide, sincère et rêvant d\'aventure.<br><br>Logan est désespérément à la recherche d\'un moyen d\'échapper à sa vie de misère...</p></div></div>'
                    . '<form id="logan-choice" action="' . url('/aventures/ambria/index') . '" method="post"></form>'
                    . '</div>'
                ),
            ],
            'actions' => [],
        ],
    ],
];
