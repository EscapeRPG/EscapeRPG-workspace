# Éditer les scénarios et afficher leur carte

Les 30 scènes de GAEA-1 utilisent le format regroupé. Les autres scénarios restent au format historique et continuent à utiliser le même moteur.

Pour une procédure pas à pas, voir le [guide de création](adventure-authoring.md). Ce document sert de référence technique ; les conventions des blocs et textes sont dans [adventure-content.md](adventure-content.md).

## Commandes

Depuis la racine du projet :

```bash
php tools/adventure.php new:scenario monaventure "Mon aventure"
php tools/adventure.php new:scene monaventure laboratoire "Laboratoire"
php tools/adventure.php map monaventure
```

Le scénario est enregistré automatiquement par `config/adventures.php` et accessible à `/aventures/monaventure`. La commande ne l’ajoute pas au catalogue éditorial de l’accueil.

Les générateurs créent uniquement une structure technique : section Markdown vide, variante `default`, aucune transition inventée. Ils refusent les identifiants invalides et l’écrasement de fichiers. Les identifiants commencent par une lettre minuscule et ne contiennent ensuite que des lettres minuscules, des chiffres ou des underscores.

Pour compléter une scène, écrire le texte, ajouter ses boutons et leurs effets, puis brancher l’accès depuis une scène existante. La commande ne choisit pas automatiquement de prédécesseur ou de suite narrative.

## Organisation

```text
config/adventures/monaventure.php
content/adventures/monaventure/scenes/
  index/
    scene.php
    text.md
  laboratoire/
    scene.php
    text.md
```

- La config principale conserve les données communes : titre, scène d’entrée, état initial, sidebar, inventaire et styles.
- `scene.php` contient le titre, les variantes et les transitions de la scène.
- `text.md` conserve le récit en Markdown, dans des sections `## section`.
- Les assets restent sous `public/`. Les vues et handlers spécialisés existants gardent leurs emplacements.
- Les fichiers communs de GAEA-1, notamment `hints.md`, `station.md`, `station_rooms.php`, l’inventaire et l’état initial, restent partagés.

## Définition d’une scène

Les clés principales sont :

| Clé | Rôle |
| --- | --- |
| `label` | Titre de scène |
| `url` | URL relative facultative ; nom du dossier par défaut |
| `view` | Vue de scène facultative |
| `handler` | Classe spécialisée facultative implémentant `AdventureSceneHandler` |
| `flow.default` | Variante initiale |
| `flow.actions` | Effets des actions |
| `variants` | Contenu habituel : blocs, boutons, indices, scripts, layout, etc. |
| `map` | Annotations de la carte, sans effet sur le gameplay |

Les références narratives restent explicites : `Content::narrative('monaventure/scenes/laboratoire/text#default')`. Le raccourci `@scene` n’est pas implémenté.

Pour un bouton `Content::action('Observer.', 'observe')`, les effets se déclarent dans le même fichier :

```php
'flow' => [
    'default' => 'default',
    'actions' => [
        'observe' => [
            'variant' => 'observed',
            'state' => ['laboratoire_observed' => true],
        ],
    ],
],
```

Ajouter la variante `observed` dans `variants` et sa section Markdown. Une transition vers une autre scène utilise `next_scene` :

```php
'continue' => ['next_scene' => 'scene_suivante', 'variant' => 'default'],
```

La cible doit exister avant de terminer l’ajout. `state` contient les changements d’état supplémentaires ; `achievements` contient les succès à attribuer. Une `variant` est enregistrée sous `{scene_cible}_variant`. Les effets d’inventaire complexes restent dans un handler spécialisé.

Les succès et les transitions de carte sont des listes PHP ordinaires : ne pas ajouter d’indices explicites `0 =>`, `1 =>`, etc. Exemple d’effet attribuant un succès :

```php
'achievements' => [
    ['scenario' => 'gaea1', 'name' => 'atterrir'],
],
```

Une action peut attribuer plusieurs succès ; chaque élément porte sa propre paire `scenario` / `name`.

## Chargement et handlers

`SceneModules::apply()` découvre les dossiers `*/scene.php` et construit les scènes, URL, aliases, chemins des fichiers et définitions de transitions attendus par le moteur. Ne pas ajouter de déclaration parallèle dans les anciens tableaux : les scènes ou flows déclarés deux fois sont refusés.

Les nouveaux scénarios utilisent `ModuleAdventureFlow` et `DeclarativeSceneHandler`, qui prennent en charge les variantes, transitions, changements d’état, succès et actions explicites de sauvegarde/chargement. Aucune sauvegarde automatique n’est introduite.

GAEA-1 conserve son flow, son handler commun et ses six handlers spécialisés. Leur sélection est maintenant déclarée dans le `scene.php` concerné, au lieu d’un `match` central dans le flow. Le constructeur d’un handler de module reçoit `(string $scene, string $defaultVariant, array $actions)` ; adapter une classe existante si elle suit un autre contrat de construction.

L’ancien format reste pris en charge pour les autres scénarios. Pour y utiliser le générateur de scènes, il faut d’abord brancher `SceneModules::apply()` dans la config et adapter son flow au chargement de ces définitions.

Les URL imbriquées ont toujours besoin de routes HTTP correspondantes dans `config/routes.php` ; les aliases ne créent pas de routes.

## Carte du scénario

```bash
php tools/adventure.php map gaea1
# Équivalent :
php tools/adventure-map.php gaea1
```

Ouvrir `var/adventure-maps/gaea1.html` dans le navigateur. C’est un fichier autonome, utilisable hors ligne, sans base de données, sans service à lancer et sans bibliothèque distante. Relancer la commande après des modifications : elle remplace uniquement cette sortie générée, ignorée par Git.

La carte propose :

- un bloc par scène et des flèches portant les actions ;
- une recherche, un zoom, une vue d’ensemble et le déplacement par glissement ou défilement ;
- un panneau avec fichiers, variantes, effets et transitions sortantes ;
- une indication des scènes d’entrée, destinations absentes et handlers dont les chemins sont partiellement connus.

Les changements de variante internes restent dans le panneau de détail pour éviter les boucles partout sur le graphe. Les chemins de fichiers sont affichés pour les retrouver dans l’IDE ; aucun lien de partie n’est ouvert automatiquement.

L’outil lit les transitions déclarées, certains `form_action`/`href` du contenu et les annotations `map`. Il n’exécute jamais les handlers. Il ne calcule pas la validité des conditions et ne simule pas le jeu. Une scène sans chemin connu depuis l’entrée n’est pas nécessairement inaccessible : les scripts, vues, liens HTML narratifs ou actions globales peuvent fournir d’autres chemins.

Une transition calculée peut être documentée dans sa scène :

```php
'map' => [
    'transitions' => [
        [
            'scene' => 'plan',
            'action' => 'sidebar:plan',
            'note' => 'Raccourci disponible pendant la visite de la station.',
        ],
    ],
],
```

Pour réutiliser une liste de destinations déjà présente dans la configuration, comme le plan de GAEA-1 :

```php
'map' => [
    'destination_config' => 'station_rooms',
    'action' => 'enter_station_room',
],
```

Cette liste contient des entrées avec `scene` et éventuellement `enabled`. Les conditions d’accès restent dans le handler. Les autres scénarios peuvent être exportés, mais leurs transitions historiques non regroupées sont signalées comme partiellement connues.

## Vérification

```bash
php tools/test_scene_modules.php
php tools/test_adventure_authoring.php
php tools/validate_adventure.php --all
```

Le premier test vérifie GAEA-1 et la compatibilité avec un scénario historique. Le second crée un scénario temporaire, teste les commandes, le rendu, les transitions, le redémarrage et la carte, puis supprime uniquement ses fichiers de test. Aucun de ces tests ne nécessite une base de données.

Le validateur prend en charge les modules, leur variante initiale et les scènes/variantes cibles déclarées. L’analyse des boutons reste en partie globale au scénario ; un passage du validateur ne remplace pas les vérifications en jeu. L’image `gaea1/offiser.png` reste volontairement absente.
