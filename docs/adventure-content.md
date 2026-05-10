# Conventions des contenus d'aventure

Ce document fixe les conventions a suivre pour les scenarios geres par le framework maison.

## Scenes et routes

- Chaque scenario declare son `slug`, son `content_path`, son `entry_scene` et ses `scenes` dans `config/adventures/{slug}.php`.
- `scenes` liste les identifiants internes des scenes.
- `scene_urls` sert a produire les routes publiques quand l'URL ne correspond pas directement a l'identifiant interne.
- `scene_aliases` sert a traduire une URL entrante vers une scene interne.
- `content_files` sert uniquement quand le fichier de contenu ne suit pas le nom de la scene.

Une scene declaree doit avoir un fichier de contenu correspondant dans `app/Content/{content_path}`.

Pour les scenarios volumineux, le fichier `config/adventures/{slug}.php` doit rester un index lisible et peut externaliser les tableaux dans un dossier dedie :

```php
$configPath = __DIR__ . '/secretsfamiliaux';

'styles' => require $configPath . '/styles.php',
'scene_aliases' => require $configPath . '/scene_aliases.php',
'scene_urls' => require $configPath . '/scene_urls.php',
'content_files' => require $configPath . '/content_files.php',
'scenes' => require $configPath . '/scenes.php',
'state' => require $configPath . '/state.php',
'assets' => require $configPath . '/assets.php',
'public_achievements' => require $configPath . '/public_achievements.php',
'inventory_items' => require $configPath . '/inventory.php',
```

Chaque fichier retourne uniquement le tableau dont il est responsable. Cela simplifie la creation d'un nouveau scenario : dupliquer le dossier de config du scenario le plus proche, puis corriger les contenus.

## Variantes de contenu

Un fichier de contenu retourne un tableau avec une cle `variants`.

Chaque variante peut contenir :

- `audio` : chemin public vers un son.
- `blocks` : paragraphes, images, dialogues, commentaires, images interactives.
- `actions` : formulaires et boutons d'action.
- `hint` : indices progressifs et reponse.
- `scripts` : scripts publics charges pour cette variante.

La logique d'ordre narratif doit rester dans les handlers et dans les conditions `visible_if`, pas dans la vue.

## Textes narratifs externalises

Le PHP de `app/Content` doit rester responsable de la structure : variantes, blocs, actions, assets, indices et conditions.

Le texte purement narratif peut etre place dans des fichiers Markdown separes sous :

```text
content/adventures/{slug}/...
```

Exemple :

```text
content/adventures/secretsfamiliaux/manoir/tableaubrule.md
```

Dans le fichier PHP de contenu :

```php
use App\Services\Adventures\Support\Content;

Content::narrative('secretsfamiliaux/manoir/tableaubrule#default');
```

Le Markdown est volontairement minimal :

- un paragraphe est separe du suivant par une ligne vide;
- les variantes d'une meme scene peuvent etre regroupees dans un seul fichier avec des titres `## section`;
- une section est chargee avec le suffixe `#section`;
- le HTML deja utilise dans les scenarios reste autorise pour les spans et liens;
- les retours explicites peuvent rester en `<br>` quand le rendu en depend.

Cela permet de relire et comparer le texte narratif sans parcourir les tableaux techniques PHP.

## Indices externalises

Pour un scenario volumineux, centraliser les indices dans un fichier dedie :

```text
content/adventures/{slug}/hints.md
```

Convention recommandee :

```md
## cle_1

Premier indice.

## cle_2

Deuxieme indice.

## cle_3

Troisieme indice.

## cle_answer

Reponse complete.
```

Dans le PHP :

```php
'hint' => Content::hint('secretsfamiliaux/hints#cle');
```

Si la reponse doit appeler `asset()` ou `url()`, garder seulement cette reponse dynamique dans le PHP :

```php
Content::hint('secretsfamiliaux/hints#cle', 3, [
    '<img src="' . asset('assets/img/example.png') . '" alt="reponse">',
]);
```

## Helpers de contenu

Les fichiers `app/Content` peuvent utiliser `App\Services\Adventures\Support\Content` pour eviter les tableaux repetitifs.

Blocs :

```php
Content::paragraph('Texte court.');
Content::paragraphs(['Premier paragraphe.', 'Deuxieme paragraphe.']);
Content::narrative('secretsfamiliaux/manoir/tableaubrule#default');
Content::dialogue('Gaspard', 'assets/img/secrets/gaspard.png', 'secretsfamiliaux/cimetiere#step_1_gaspard');
Content::image('assets/img/secrets/tableau.png', 'un tableau', 'enigmelieu');
Content::linkedImage('assets/img/secrets/papier.png', 'un papier');
Content::comments();
```

`Content::dialogue(...)` accepte aussi un tableau de paragraphes en troisieme argument quand le texte ne doit pas etre externalise.

Exemple de fichier groupe :

```md
## missing

Vous n'avez pas encore trouve cet objet.

## default

Le texte affiche quand l'objet est disponible.
```

Image interactive et hotspots :

```php
Content::interactiveImage(
    'assets/img/secrets/chambre.png',
    'la chambre',
    [
        Content::hotspot('tiroir', 'open_drawer', 'assets/img/secrets/buttontiroir.png', 'tiroir'),
    ],
);
```

Actions :

```php
Content::action('Retour.', 'retour');
Content::ask('Fouiller.', 'fouille', 'fouiller');
Content::hint('secretsfamiliaux/hints#coffret_code');
```

Conditions simples :

```php
Content::stateTruthy('pellington_visit');
Content::stateFalsy('pellington_visit');
Content::stateEquals('story_ending', 'fin4');
Content::inventoryHas('tableaubrule');
Content::inventoryMissing('piecead');
```

Tous les helpers acceptent un tableau `$extra` quand une cle plus rare doit etre ajoutee, par exemple `visible_if`, `src_options`, `attributes` ou `form_action`.

## `id`, `class`, `value` et `data-*`

Regle generale :

- `value` porte l'action metier envoyee au handler.
- `class` porte le style, le positionnement et les hooks CSS.
- `id` est reserve aux besoins JS explicites, aux ancres HTML, aux associations `label for`, ou aux zones de drop qui sont ciblees par identifiant.
- `data-*` est a preferer quand un script a besoin d'une information sans dependance de style.

Pour les hotspots interactifs :

```php
[
    'class' => 'tiroir',
    'src' => 'assets/img/example/button.png',
    'alt' => 'tiroir',
    'value' => 'open_drawer',
]
```

Le handler ne doit pas dependre de la classe CSS. Il recoit uniquement `value`.

## Assets

Les chemins d'assets sont relatifs a `public/`.

Exemples :

- `assets/img/secrets/tableaubrule.png`
- `assets/sounds/secrets/rituel.mp3`
- `assets/js/adventures/secrets_familiaux/dragDropCoffret.js`

Chaque asset reference dans une config ou un contenu doit exister.

## Inventaire

Les objets d'inventaire sont declares dans la config du scenario quand ils doivent apparaitre dans les donnees communes : toasts, footer, validation des assets.

Pour les gros scenarios, preferer un fichier dedie :

```php
'inventory_items' => require __DIR__ . '/secretsfamiliaux/inventory.php',
```

Format courant :

```php
'papier' => [
    'image' => 'assets/img/secrets/papier.png',
    'alt' => 'Un morceau de papier avec une inscription etrange.',
],

'coffret' => [
    'image' => 'assets/img/secrets/coffret.png',
    'alt' => 'Un petit coffret ouvrage.',
    'route' => 'manoir/coffret',
],
```

Quand un objet contient des indices ou une interaction dediee, preferer une route propre :

```text
/aventures/{slug}/manoir/coffret
/aventures/{slug}/manoir/tableaubrule
```

Le footer peut alors pointer vers la route au lieu d'ouvrir seulement une image.

## Footer et sidebar

Les scenarios peuvent utiliser les vues generiques :

```php
'sidebar_view' => 'adventures/partials/sidebar',
'footer_view' => 'adventures/partials/footer',
```

Le footer generique lit `inventory_items` et les notes du state. La sidebar generique est pilotee par la cle `sidebar` :

```php
'sidebar' => [
    'portrait' => [
        'image' => 'assets/img/example/player.png',
        'alt' => 'Personnage',
    ],
    'navigation' => [
        [
            'visible_on' => ['rdc', 'salon'],
            'class' => 'example-navigation',
            'title' => 'Lieu',
            'items' => [
                ['label' => 'Rez-de-chaussée', 'route' => 'manoir/rdc'],
            ],
        ],
    ],
],
```

Les liens et formulaires acceptent `route_options` et `value_options` avec les conditions simples `state/truthy/falsy/equals/not_equals`.

## Fins de scenario

Pour les fins multiples :

- stocker l'etat de fin dans le state, par exemple `story_finished` et `story_ending`;
- proteger la page finale si `story_finished` est absent;
- conserver les variantes de texte de fin;
- afficher le score ou les etoiles selon la fin obtenue;
- garder les commentaires via le handler final commun quand possible.

## Succes

Les succes accordes par les handlers doivent utiliser le slug courant du scenario :

```php
['scenario' => 'secretsfamiliaux', 'name' => 'fin']
```

L'image correspondante doit exister ici :

```text
public/assets/img/succes/{scenario}/{name}.png
```

La variante verrouillee est attendue sous la forme :

```text
public/assets/img/succes/{scenario}/{name}off.png
```

Elle peut etre omise pour un succes cache. Pour eviter les faux positifs, declarer les succes visibles dans la config du scenario :

```php
'public_achievements' => [
    'debut',
    'fin',
],
```

Quand cette cle est presente, le validateur ne reclame une variante `off` que pour ces succes publics.

## Validation

Utiliser le validateur avant de considerer une migration comme terminee :

```bash
php tools/validate_adventure.php secretsfamiliaux
php tools/validate_adventure.php --all
```

Le validateur signale les fichiers manquants, assets manquants, vues manquantes, succes sans image, et les `id` presents dans les contenus d'aventure.
