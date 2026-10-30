# Créer un scénario ou une scène

Ce guide décrit le parcours actuel : GAEA-1 et les nouveaux scénarios utilisent des scènes regroupées. Pour modifier Secrets Familiaux, Last Party, Ambria ou Avent sans les migrer, suivre le [guide du format historique](adventure-authoring-legacy.md).

Les [conventions de contenu](adventure-content.md) décrivent les blocs, dialogues, images, indices, inventaires et succès. Le [guide technique des scènes regroupées](scene-modules.md) détaille le chargeur, les handlers et la carte.

## Principes

- Conserver le récit dans les fichiers Markdown et la structure dans `scene.php`.
- Ne pas inventer de récit, variante ou fin sans validation explicite.
- Utiliser les vues et handlers communs ; ajouter du PHP spécialisé pour les interactions qui le nécessitent.
- Conserver les identifiants de scènes, URL et clés d’état lorsqu’on modifie un scénario existant.
- Les sauvegardes persistantes restent une action explicite du joueur.

## Créer un scénario

Depuis la racine du projet :

```bash
php tools/adventure.php new:scenario monaventure "Mon aventure"
```

La commande génère :

```text
config/adventures/monaventure.php
content/adventures/monaventure/scenes/index/
  scene.php
  text.md
```

La config charge les scènes automatiquement avec `SceneModules::apply()` et utilise `ModuleAdventureFlow`. Aucun flow propre au scénario n’est nécessaire pour les interactions déclaratives simples.

La scène d’entrée est `index`, avec une variante `default`, une section Markdown vide et aucune action. Compléter les textes et le contenu avant de jouer. Le scénario est enregistré automatiquement et accessible à `/aventures/monaventure` ; son ajout à l’accueil se gère séparément dans le catalogue éditorial.

Les commandes refusent les fichiers existants. Les identifiants commencent par une lettre minuscule, puis n’utilisent que des lettres minuscules, chiffres ou underscores.

## Ajouter une scène

```bash
php tools/adventure.php new:scene monaventure laboratoire "Laboratoire"
```

Pour GAEA-1 :

```bash
php tools/adventure.php new:scene gaea1 laboratoire "Laboratoire"
```

La commande crée `scenes/laboratoire/scene.php` et `text.md`. Il n’y a pas de déclaration à ajouter dans `scenes.php`, `flow.php`, `content_files.php` ou une table centrale de handlers.

### 1. Écrire le Markdown

Dans `text.md`, conserver les sections utilisées par les variantes :

```md
## default

## observed
```

Les sections ci-dessus sont volontairement vides : y placer les textes validés.

### 2. Définir le contenu et ses effets

Exemple de structure pour `scene.php` :

```php
<?php

use App\Services\Adventures\Support\Content;

return [
    'label' => 'Laboratoire',
    'flow' => [
        'default' => 'default',
        'actions' => [
            'observe' => [
                'variant' => 'observed',
                'state' => ['laboratoire_observed' => true],
            ],
        ],
    ],
    'variants' => [
        'default' => [
            'blocks' => [
                Content::narrative('monaventure/scenes/laboratoire/text#default'),
            ],
            'actions' => [Content::action('Observer.', 'observe')],
        ],
        'observed' => [
            'blocks' => [
                Content::narrative('monaventure/scenes/laboratoire/text#observed'),
            ],
        ],
    ],
];
```

Adapter le slug des références Markdown au scénario. Le bouton envoie l’action `observe` ; le handler commun applique ses effets et affiche la variante `observed`. Une variante n’est pas une nouvelle scène.

### 3. Brancher l’accès et la suite

Dans la scène précédente, ajouter un bouton et l’effet correspondant :

```php
// Dans les actions de la variante affichée :
Content::action('Aller au laboratoire.', 'go_laboratoire'),

// Dans flow.actions :
'go_laboratoire' => ['next_scene' => 'laboratoire', 'variant' => 'default'],
```

Les deux listes `actions` ont des rôles distincts : `variants.*.actions` définit les boutons visibles ; `flow.actions` définit leurs effets. Les hotspots et formulaires spécialisés peuvent également envoyer des actions.

La commande ne choisit pas de prédécesseur ni de suite. Lorsqu’une action doit continuer le récit, créer au minimum la définition de la scène cible avant de terminer l’ajout. Ne pas laisser un bouton « Continuer » reboucler par oubli.

### 4. Ajouter les éléments spécifiques

- Config commune : styles, état initial, inventaire, succès et navigation.
- Variante : blocs, audio, indices, scripts, `page_view` ou `layout` si nécessaire.
- Scène : `url` facultative et `handler` spécialisé si l’interaction dépasse les effets déclaratifs.

Une URL imbriquée nécessite toujours une route HTTP correspondante. Pour les constructeurs de handlers, les effets disponibles et les annotations de carte, voir [scene-modules.md](scene-modules.md).

## Vérifier et explorer

```bash
php -l content/adventures/monaventure/scenes/laboratoire/scene.php
php tools/validate_adventure.php monaventure
php tools/adventure.php map monaventure
```

Ouvrir `var/adventure-maps/monaventure.html` pour explorer les transitions. Régénérer la carte après modification. Elle lit les chemins déclarés et annotés ; elle ne simule pas les conditions ni les handlers.

Vérifier ensuite en jeu les variantes, boutons, transitions, indices, mini-jeux, navigation et sauvegarde/chargement. Les contrôles automatiques ne remplacent pas cette vérification.

Pour contrôler le moteur et les outils après une modification technique :

```bash
php tools/test_scene_modules.php
php tools/test_adventure_authoring.php
php tools/validate_adventure.php --all
```

Le validateur global signale encore l’image volontairement absente `public/assets/img/succes/gaea1/offiser.png`. Ce signalement est connu ; ne pas créer d’image de remplacement pour faire passer le contrôle.

## Checklist

- Définition et Markdown présents dans le dossier de scène.
- Références Markdown et noms de variantes cohérents.
- Boutons et effets associés ; accès depuis une scène existante branché.
- Destinations créées et URL compatibles avec les routes HTTP.
- Assets et données communes renseignés selon les besoins.
- Listes PHP écrites sans indices numériques explicites inutiles, notamment `achievements` et `map.transitions`.
- Validation effectuée, carte régénérée si utilisée, parcours vérifié en jeu.
