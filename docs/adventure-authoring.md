# Créer un scénario ou une scène

Ce document sert de checklist pratique pour ajouter du contenu dans le framework d’aventures. Il complète `docs/adventure-content.md`, qui détaille les conventions de structure, de Markdown, d’inventaire et de validation.

## Principes

- Garder le texte narratif dans `content/adventures/{slug}/...md`.
- Garder `app/Content/Adventures/.../*.php` pour la structure : variantes, blocs, actions, assets, indices.
- Utiliser les vues génériques par défaut.
- Créer une vue dédiée seulement pour un mini-jeu, une interaction complexe ou un layout spécial.
- Ne pas ajouter de texte narratif sans validation explicite quand il s’agit d’un contenu déjà écrit.
- Toujours brancher une scène vers une scène suivante minimale quand une action doit continuer l’aventure.

## Créer un nouveau scénario

### 1. Choisir les identifiants

Définir :

- le slug public, par exemple `monaventure` ;
- le titre affiché, par exemple `Mon Aventure` ;
- la scène d’entrée, par exemple `index` ;
- le namespace PHP de contenu, par exemple `App/Content/Adventures/MonAventure` ;
- le dossier Markdown, par exemple `content/adventures/monaventure`.

Le slug doit rester stable : il sert aux routes, aux assets, aux sauvegardes et aux succès.

### 2. Créer la config principale

Fichier minimal :

```text
config/adventures/{slug}.php
```

Pour un scénario court, la config peut tenir dans ce fichier. Pour un scénario long, préférer un dossier dédié :

```text
config/adventures/{slug}/
```

Fichiers recommandés pour un gros scénario :

```text
config/adventures/{slug}/styles.php
config/adventures/{slug}/scene_aliases.php
config/adventures/{slug}/scene_urls.php
config/adventures/{slug}/content_files.php
config/adventures/{slug}/scenes.php
config/adventures/{slug}/state.php
config/adventures/{slug}/assets.php
config/adventures/{slug}/public_achievements.php
config/adventures/{slug}/inventory.php
config/adventures/{slug}/sidebar.php
```

La config principale doit au minimum renseigner :

```php
<?php

$configPath = __DIR__ . '/monaventure';

return [
    'slug' => 'monaventure',
    'title' => 'Mon Aventure',
    'layout' => 'adventure',
    'entry_scene' => 'index',
    'content_path' => 'Adventures/MonAventure',
    'flow' => App\Services\Adventures\Scenarios\MonAventure\MonAventureFlow::class,
    'sidebar_view' => 'adventures/partials/sidebar',
    'footer_view' => 'adventures/partials/footer',
    'styles' => require $configPath . '/styles.php',
    'scene_aliases' => require $configPath . '/scene_aliases.php',
    'scene_urls' => require $configPath . '/scene_urls.php',
    'content_files' => require $configPath . '/content_files.php',
    'scenes' => require $configPath . '/scenes.php',
    'state' => require $configPath . '/state.php',
    'assets' => require $configPath . '/assets.php',
    'public_achievements' => require $configPath . '/public_achievements.php',
    'inventory_items' => require $configPath . '/inventory.php',
    'sidebar' => require $configPath . '/sidebar.php',
];
```

Adapter le nom de classe du flow et les chemins selon le scénario.

### 3. Déclarer les scènes

Dans `config/adventures/{slug}/scenes.php` :

```php
<?php

return [
    'index' => [
        'handler' => App\Services\Adventures\Scenarios\MonAventure\Scenes\IndexSceneHandler::class,
    ],
];
```

Si plusieurs scènes partagent le même handler, le déclarer explicitement pour chaque scène.

### 4. Déclarer les routes publiques

Si l’URL publique est identique à l’identifiant interne, `scene_urls.php` et `scene_aliases.php` peuvent rester vides.

Exemple avec une URL différente :

```php
// scene_urls.php
return [
    'porte_secrete' => 'manoir/porte-secrete',
];
```

```php
// scene_aliases.php
return [
    'manoir/porte-secrete' => 'porte_secrete',
];
```

### 5. Créer les contenus PHP

Dossier :

```text
app/Content/Adventures/{NomScenario}/
```

Fichier d’entrée :

```text
app/Content/Adventures/{NomScenario}/index.php
```

Exemple minimal :

```php
<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'default' => [
            'blocks' => [
                Content::narrative('monaventure/index#default'),
            ],
            'actions' => [
                Content::action('Continuer.', 'continue'),
            ],
        ],
    ],
];
```

### 6. Créer les textes Markdown

Dossier :

```text
content/adventures/{slug}/
```

Exemple :

```md
## default

Texte narratif de la première scène.
```

Pour les indices, créer si besoin :

```text
content/adventures/{slug}/hints.md
```

Avec la convention :

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

### 7. Créer le flow et les handlers

Dossier recommandé :

```text
app/Services/Adventures/Scenarios/{NomScenario}/
app/Services/Adventures/Scenarios/{NomScenario}/Scenes/
```

Le flow sert à brancher le scénario sur le moteur commun. Les handlers gèrent les actions envoyées par les formulaires.

Pour un gros scénario, créer un handler de base :

```text
app/Services/Adventures/Scenarios/{NomScenario}/Scenes/{NomScenario}SceneHandler.php
```

Puis des handlers par scène ou groupe de scènes :

```text
app/Services/Adventures/Scenarios/{NomScenario}/Scenes/IndexSceneHandler.php
app/Services/Adventures/Scenarios/{NomScenario}/Scenes/LieuSceneHandler.php
```

Éviter les handlers monolithiques quand le scénario devient long.

### 8. Ajouter les assets

Chemins recommandés :

```text
public/assets/styles/aventures/{slug}/
public/assets/js/adventures/{slug}/
public/assets/img/{slug}/
public/assets/sounds/{slug}/
public/assets/img/succes/{slug}/
```

Déclarer les CSS dans `styles.php` :

```php
return [
    'assets/styles/aventures/{slug}/style.css',
];
```

Déclarer les scripts dans les variantes de contenu quand ils ne sont utiles que sur une scène :

```php
'scripts' => [
    'assets/js/adventures/{slug}/mini-jeu.js',
],
```

### 9. Configurer sidebar, inventaire et succès

Sidebar générique :

```php
return [
    'portrait' => [
        'image' => 'assets/img/{slug}/portrait.png',
        'alt' => 'Portrait',
    ],
    'navigation' => [],
];
```

Inventaire :

```php
return [
    'objet' => [
        'image' => 'assets/img/{slug}/objet.png',
        'alt' => 'Un objet.',
    ],
];
```

Succès publics :

```php
return [
    'debut',
    'fin',
];
```

Images attendues :

```text
public/assets/img/succes/{slug}/debut.png
public/assets/img/succes/{slug}/debutoff.png
```

### 10. Valider

Commandes :

```bash
php -l config/adventures/{slug}.php
php tools/validate_adventure.php {slug}
```

Puis vérifier en jeu :

- l’entrée du scénario ;
- l’affichage du footer et de la sidebar ;
- la sauvegarde ;
- les routes ;
- les assets ;
- les indices ;
- les transitions.

## Créer une nouvelle scène

### 1. Choisir l’identifiant interne

Exemple :

```text
laboratoire
```

Garder un identifiant simple, stable, sans espace ni accent.

### 2. Déclarer la scène dans la config

Dans `config/adventures/{slug}/scenes.php` :

```php
'laboratoire' => [
    'handler' => App\Services\Adventures\Scenarios\MonAventure\Scenes\LaboratoireSceneHandler::class,
],
```

Si la scène utilise un handler existant, pointer vers ce handler existant.

### 3. Ajouter la route si besoin

Si l’URL doit être différente :

```php
// scene_urls.php
'laboratoire' => 'station/laboratoire',
```

```php
// scene_aliases.php
'station/laboratoire' => 'laboratoire',
```

Si le fichier de contenu ne s’appelle pas comme la scène :

```php
// content_files.php
'laboratoire' => 'Station/laboratoire',
```

### 4. Créer le fichier de contenu PHP

Chemin standard :

```text
app/Content/Adventures/{NomScenario}/laboratoire.php
```

Exemple :

```php
<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'default' => [
            'blocks' => [
                Content::narrative('monaventure/laboratoire#default'),
            ],
            'actions' => [
                Content::action('Observer la pièce.', 'observe'),
            ],
        ],
        'observed' => [
            'blocks' => [
                Content::narrative('monaventure/laboratoire#observed'),
            ],
            'actions' => [
                Content::action('Continuer.', 'continue'),
            ],
        ],
    ],
];
```

### 5. Créer le Markdown

Chemin standard :

```text
content/adventures/{slug}/laboratoire.md
```

Exemple :

```md
## default

Texte affiché à la première arrivée.

## observed

Texte affiché après observation.
```

### 6. Créer ou compléter le handler

Le handler doit :

- lire l’action envoyée ;
- mettre à jour les states nécessaires ;
- choisir la variante suivante ;
- router vers une autre scène si besoin ;
- ne pas poser trop tôt un state qui ferait sauter une intro narrative.

Exemple de logique attendue :

```php
return match ($action) {
    'observe' => $this->showScene($scene, 'observed', [
        'laboratoire_observed' => true,
    ]),
    'continue' => $this->redirectToScene('scene_suivante'),
    default => $this->showScene($scene, 'default'),
};
```

Adapter aux méthodes exactes disponibles dans le handler du scénario.

### 7. Brancher la scène précédente

Dans le contenu ou le handler de la scène précédente, ajouter l’action qui mène vers la nouvelle scène.

Ne pas laisser une réussite de mini-jeu ou un bouton `Continuer` reboucler sur la scène courante si la suite existe.

### 8. Ajouter une scène suivante minimale

Si la nouvelle scène se termine par une action `continue`, créer tout de suite une scène suivante minimale :

- déclaration dans `scenes.php` ;
- fichier `app/Content` ;
- section Markdown si besoin ;
- handler ou route minimale.

Cela évite les fins d’ajout oubliées.

### 9. Ajouter les assets et scripts propres à la scène

Pour une image, un son ou un script :

```php
'audio' => 'assets/sounds/{slug}/ambiance.mp3',
'scripts' => [
    'assets/js/adventures/{slug}/laboratoire.js',
],
```

Si un asset est volontairement absent pendant une phase de conception, le signaler explicitement dans le contenu avec la convention du scénario plutôt que de contourner l’étape de gameplay.

### 10. Mettre à jour la navigation si besoin

Selon le scénario :

- ajouter la scène dans la sidebar ;
- ajouter ou modifier les states de pièce visitée/testée ;
- vérifier les routes d’inventaire ;
- vérifier les conditions `visible_if`.

### 11. Valider la scène

Commandes :

```bash
php -l app/Content/Adventures/{NomScenario}/laboratoire.php
php tools/validate_adventure.php {slug}
```

Vérifier ensuite manuellement :

- variante par défaut ;
- variantes conditionnelles ;
- actions ;
- indices et réponse ;
- sons ;
- scripts ;
- sauvegarde ;
- retour/navigation ;
- scène suivante.

## Checklist rapide

Pour un nouveau scénario :

- config principale créée ;
- dossier config créé si scénario long ;
- scènes déclarées ;
- routes publiques déclarées si besoin ;
- flow et handlers créés ;
- fichiers `app/Content` créés ;
- Markdown créé ;
- assets déclarés ;
- sidebar/footer configurés ;
- inventaire et succès déclarés ;
- validation lancée.

Pour une nouvelle scène :

- scène déclarée ;
- route/alias/content file déclarés si besoin ;
- contenu PHP créé ;
- Markdown créé ;
- handler créé ou complété ;
- scène précédente branchée ;
- scène suivante minimale posée si nécessaire ;
- assets/scripts déclarés ;
- navigation mise à jour ;
- validation lancée.
