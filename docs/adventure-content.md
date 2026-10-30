# Conventions des contenus d’aventure

Les conventions de blocs, textes, indices, inventaires et succès sont communes aux deux formats de scénarios. Pour la création, commencer par le [guide pratique](adventure-authoring.md). Les détails du chargeur et de la carte figurent dans [scene-modules.md](scene-modules.md).

## Organisation des scènes

| Format | Définition PHP | Texte Markdown | Scénarios concernés |
| --- | --- | --- | --- |
| Regroupé | `content/adventures/{slug}/scenes/{scene}/scene.php` | `text.md` dans le même dossier | GAEA-1 et nouveaux scénarios |
| Historique | `app/Content/{content_path}/{scene}.php`, avec exceptions via `content_files` | `content/adventures/{slug}/...md` | Secrets Familiaux, Last Party, Ambria, Avent |

Chaque scénario conserve sa config principale dans `config/adventures/{slug}.php`, avec `slug`, `title`, `entry_scene`, `flow` et les données communes. `content_path` appartient au chargement historique et n’est pas nécessaire pour un scénario entièrement regroupé.

Au format regroupé, `SceneModules::apply()` construit `scenes`, `scene_urls`, `scene_aliases`, `scene_module_files` et `scene_definitions` depuis les modules. Ces tableaux ne sont pas à maintenir manuellement en parallèle.

Au format historique :

- `scenes` liste les identifiants internes et les métadonnées (`label`, `view`) ;
- `scene_urls` donne les chemins publics différents des identifiants ;
- `scene_aliases` traduit les chemins entrants en identifiants ;
- `content_files` indique les fichiers de contenu dont le nom ne suit pas celui de la scène.

Les configurations communes volumineuses peuvent rester réparties sous `config/adventures/{slug}/` : état initial, inventaire, sidebar, styles, succès, etc. Regrouper les scènes n’impose pas de dupliquer ces données partagées.

## Flows et handlers

`AdventureFlowFactory` instancie la classe indiquée par `flow`. Les flows à handlers étendent `SceneBasedAdventureFlow` et exposent leurs instances via `handlers()`.

- Les nouveaux scénarios utilisent `ModuleAdventureFlow` et le handler commun `DeclarativeSceneHandler`.
- GAEA-1 utilise `Gaea1AdventureFlow`, son handler commun et ses handlers spécialisés, sélectionnés par la clé `handler` de chaque module.
- Les scénarios historiques conservent leur table d’instances ou leurs définitions dans le flow. Leur procédure est décrite dans le [guide historique](adventure-authoring-legacy.md).

La clé `handler` d’un **module `scene.php`** est prise en charge par `SceneModules`. Une clé `handler` ajoutée directement à **`config['scenes'][scene]`** ne suffit pas à enregistrer une classe : le moteur lit les instances exposées par le flow.

Les handlers de modules sont construits avec `(string $scene, string $defaultVariant, array $actions)` et implémentent `AdventureSceneHandler`. `variant()` choisit le contenu, `viewData()` fournit les données de vue et `handle()` retourne un `AdventureActionResult`.

Sans clé `flow`, la factory utilise `GenericAdventureFlow`, un comportement minimal avec navigation par champ POST `scene` ; ce n’est pas le flow à employer pour les nouveaux scénarios regroupés.

## Routes publiques

`scene_urls` et `scene_aliases` ne créent pas de routes HTTP. La route `/aventures/{slug}/{scene}` couvre un seul segment de scène. Un chemin imbriqué doit être couvert en GET et POST dans `config/routes.php` via `showPath` et `updatePath`.

Au format regroupé, une clé `url` dans `scene.php` définit un chemin personnalisé et son alias ; le nom du dossier reste l’identifiant interne.

## Cycle de traitement d’une scène

Avec `SceneBasedAdventureFlow` :

1. À l’affichage, la scène est vérifiée dans `scenes`, puis `handlers()` fournit son handler.
2. `variant()` choisit la variante. `AdventureContent` lit le module ou le contenu historique, puis prend cette variante, ou `default` si elle manque.
3. Le moteur applique `NarrativeTemplate`, ajoute les notes du contenu à l’état et prépare `viewData()` ainsi que les données d’indices.
4. La page utilise `adventures/show` par défaut. La variante peut définir `page_view` et `layout` ; une vue de scène se configure avec `view` dans le module, ou avec `scenes[scene]['view']` / `scene_views` au format historique.
5. À la soumission, le moteur traite le redémarrage, les actions globales du flow puis les indices, avant `handle()` du handler. Celui-ci retourne les effets (`nextScene`, `stateChanges`, `achievements`, etc.) appliqués par le contrôleur.

Le handler déclaratif et celui de GAEA-1 traduisent `flow.actions[action].variant` en une clé d’état `{scene_cible}_variant`. Un handler spécialisé doit choisir lui-même la variante à partir de son état ; le moteur n’invente pas cette logique.

## Variantes de contenu

Un fichier de contenu retourne un tableau avec une clé `variants`.

Chaque variante peut contenir :

- `audio` : chemin public vers un son ;
- `blocks` : paragraphes, images, dialogues, commentaires, images interactives ;
- `actions` : formulaires et boutons d’action ;
- `hint` : indices progressifs et réponse ;
- `scripts` : scripts publics chargés pour cette variante.

La logique d’ordre narratif appartient aux effets `flow.actions`, aux handlers et aux conditions `visible_if`, pas à la vue.

## Textes narratifs externalisés

Le PHP (`scene.php` ou contenu historique dans `app/Content`) définit la structure : variantes, blocs, actions, assets, indices et conditions.

Conserver le texte purement narratif dans des fichiers Markdown séparés sous :

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

- un paragraphe est séparé du suivant par une ligne vide ;
- les variantes d’une même scène peuvent être regroupées dans un seul fichier avec des titres `## section` ;
- une section est chargée avec le suffixe `#section` ;
- le HTML déjà utilisé dans les scénarios reste autorisé pour les spans et liens ;
- les retours explicites peuvent rester en `<br>` quand le rendu en dépend.

Cela permet de relire et comparer le texte narratif sans parcourir les tableaux techniques PHP.

## Indices externalisés

Pour un scénario volumineux, centraliser les indices dans un fichier dédié :

```text
content/adventures/{slug}/hints.md
```

Convention recommandée :

```md
## cle_1

Premier indice.

## cle_2

Deuxième indice.

## cle_3

Troisième indice.

## cle_answer

Réponse complète.
```

Dans le PHP :

```php
'hint' => Content::hint('secretsfamiliaux/hints#cle');
```

Si la réponse doit appeler `asset()` ou `url()`, garder seulement cette réponse dynamique dans le PHP :

```php
Content::hint('secretsfamiliaux/hints#cle', 3, [
    '<img src="' . asset('assets/img/example.png') . '" alt="réponse">',
]);
```

## Helpers de contenu

Les modules `scene.php` et les contenus historiques peuvent utiliser `App\Services\Adventures\Support\Content` pour éviter les tableaux répétitifs.

Blocs :

```php
Content::paragraph('Texte court.');
Content::paragraphs(['Premier paragraphe.', 'Deuxième paragraphe.']);
Content::narrative('secretsfamiliaux/manoir/tableaubrule#default');
Content::dialogue('Gaspard', 'assets/img/secrets/gaspard.png', 'secretsfamiliaux/cimetiere#step_1_gaspard');
Content::image('assets/img/secrets/tableau.png', 'un tableau', 'enigmelieu');
Content::linkedImage('assets/img/secrets/papier.png', 'un papier');
Content::comments();
```

`Content::dialogue(...)` accepte aussi un tableau de paragraphes en troisième argument quand le texte ne doit pas être externalisé.

Exemple de fichier groupé :

```md
## missing

Vous n’avez pas encore trouvé cet objet.

## default

Le texte affiché quand l’objet est disponible.
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

Les helpers qui exposent un paramètre `$extra` (notamment les images, dialogues, hotspots et actions) permettent d’ajouter des clés comme `visible_if`, `src_options`, `attributes` ou `form_action`. Vérifier la signature dans `app/Services/Adventures/Support/Content.php` : les helpers de paragraphes et de conditions, par exemple, n’ont pas ce paramètre.

## `id`, `class`, `value` et `data-*`

Règle générale :

- `value` porte l’action métier envoyée au handler ;
- `class` porte le style, le positionnement et les hooks CSS ;
- `id` est réservé aux besoins JS explicites, aux ancres HTML, aux associations `label for`, ou aux zones de drop qui sont ciblées par identifiant ;
- `data-*` est à préférer quand un script a besoin d’une information sans dépendance de style.

Pour les hotspots interactifs :

```php
[
    'class' => 'tiroir',
    'src' => 'assets/img/example/button.png',
    'alt' => 'tiroir',
    'value' => 'open_drawer',
]
```

Le handler ne doit pas dépendre de la classe CSS. La valeur du bouton est envoyée dans le champ POST `action`, lu avec `$request->post('action', '')`. Il peut également lire les autres champs du formulaire via `Request`.

Pour les nouveaux hotspots simples, préférer `Content::hotspotAt(...)` quand un positionnement en pourcentage suffit :

```php
Content::hotspotAt(
    'open_drawer',
    left: 42,
    top: 58,
    width: 12,
    height: 8,
    src: 'assets/img/example/button.png',
    alt: 'tiroir',
);
```

Les valeurs numériques sont interprétées en pourcentage du conteneur de l’image interactive. Les anciennes classes de positionnement restent possibles pour les cas plus complexes.

## Assets

Les chemins d’assets sont relatifs à `public/`.

Exemples :

- `assets/img/secrets/tableaubrule.png`
- `assets/sounds/secrets/rituel.mp3`
- `assets/js/adventures/secrets_familiaux/dragDropCoffret.js`

Chaque asset référencé dans une config ou un contenu doit exister, sauf exception explicitement signalée pendant une phase de conception.

## Inventaire

Les objets d’inventaire sont déclarés dans la config du scénario quand ils doivent apparaître dans les données communes : toasts, footer, validation des assets.

Pour les gros scénarios, préférer un fichier dédié :

```php
'inventory_items' => require __DIR__ . '/secretsfamiliaux/inventory.php',
```

Format courant :

```php
'papier' => [
    'image' => 'assets/img/secrets/papier.png',
    'alt' => 'Un morceau de papier avec une inscription étrange.',
],

'coffret' => [
    'image' => 'assets/img/secrets/coffret.png',
    'alt' => 'Un petit coffret ouvragé.',
    'route' => 'manoir/coffret',
],
```

Quand un objet contient des indices ou une interaction dédiée, préférer une route propre :

```text
/aventures/{slug}/manoir/coffret
/aventures/{slug}/manoir/tableaubrule
```

Le footer peut alors pointer vers la route au lieu d’ouvrir seulement une image.

## Footer et sidebar

Les scénarios peuvent utiliser les vues génériques :

```php
'sidebar_view' => 'adventures/partials/sidebar',
'footer_view' => 'adventures/partials/footer',
```

Le footer générique lit `inventory_items` et les notes du state. La sidebar générique est pilotée par la clé `sidebar` :

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

## Fins de scénario

Pour les fins multiples :

- stocker l’état de fin dans le state, par exemple `story_finished` et `story_ending` ;
- protéger la page finale si `story_finished` est absent ;
- conserver les variantes de texte de fin ;
- afficher le score ou les étoiles selon la fin obtenue ;
- garder les commentaires via le handler final commun quand possible.

## Succès

Les succès accordés par les handlers doivent utiliser le slug courant du scénario :

```php
['scenario' => 'secretsfamiliaux', 'name' => 'fin']
```

Dans un effet déclaratif ou un `AdventureActionResult`, `achievements` est une liste de ces paires, sans indices numériques explicites :

```php
'achievements' => [
    ['scenario' => 'gaea1', 'name' => 'atterrir'],
],
```

Les succès communs au site peuvent utiliser le scénario `general`. Une même action peut attribuer plusieurs succès.

L’image correspondante doit exister ici :

```text
public/assets/img/succes/{scenario}/{name}.png
```

La variante verrouillée est attendue sous la forme :

```text
public/assets/img/succes/{scenario}/{name}off.png
```

Elle peut être omise pour un succès caché. Pour éviter les faux positifs, déclarer les succès visibles dans la config du scénario :

```php
'public_achievements' => [
    'debut',
    'fin',
],
```

Quand cette clé est présente, le validateur ne réclame une variante `off` que pour ces succès publics.

## Validation

Utiliser le validateur avant de considérer un ajout comme terminé :

```bash
php tools/validate_adventure.php secretsfamiliaux
php tools/validate_adventure.php --all
```

Le validateur signale les fichiers manquants, assets manquants, vues manquantes, succès sans image, références Markdown invalides, actions de contenu sans handler identifiable, `id` présents dans les contenus d’aventure, et CSS publics non référencés lors d’un contrôle global `--all`.

Pour les scènes regroupées, il vérifie aussi la variante initiale et les scènes/variantes cibles déclarées dans `flow.actions`. Les annotations `map` servent à l’exploration ; elles ne remplacent pas une transition de gameplay.

Le contrôle des actions analyse les sources du scénario : il ne prouve pas que chaque scène possède le bon handler dans `handlers()`, ni que les transitions fonctionnent en jeu. Vérifier aussi la cohérence config/flow et tester les actions manuellement. Les signalements sur les actions, les références Markdown et les `id` sont des avertissements ; un code de sortie `0` signifie qu’aucune erreur bloquante n’a été détectée, même si des avertissements restent présents.

L’image `public/assets/img/succes/gaea1/offiser.png` est volontairement absente à ce stade et reste signalée comme erreur par le contrôle global. Ne pas supprimer le succès ni ajouter de fichier factice pour masquer ce signalement attendu.
