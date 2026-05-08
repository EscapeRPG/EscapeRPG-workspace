# Conventions des contenus d'aventure

Ce document fixe les conventions a suivre pour les scenarios geres par le framework maison.

## Scenes et routes

- Chaque scenario declare son `slug`, son `content_path`, son `entry_scene` et ses `scenes` dans `config/adventures/{slug}.php`.
- `scenes` liste les identifiants internes des scenes.
- `scene_urls` sert a produire les routes publiques quand l'URL ne correspond pas directement a l'identifiant interne.
- `scene_aliases` sert a traduire une URL entrante vers une scene interne.
- `content_files` sert uniquement quand le fichier de contenu ne suit pas le nom de la scene.

Une scene declaree doit avoir un fichier de contenu correspondant dans `app/Content/{content_path}`.

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
content/adventures/secretsfamiliaux/manoir/tableaubrule/default.md
```

Dans le fichier PHP de contenu :

```php
use App\Services\Adventures\Support\Content;

Content::narrative('secretsfamiliaux/manoir/tableaubrule/default');
```

Le Markdown est volontairement minimal :

- un paragraphe est separe du suivant par une ligne vide;
- le HTML deja utilise dans les scenarios reste autorise pour les spans et liens;
- les retours explicites peuvent rester en `<br>` quand le rendu en depend.

Cela permet de relire et comparer le texte narratif sans parcourir les tableaux techniques PHP.

## Helpers de contenu

Les fichiers `app/Content` peuvent utiliser `App\Services\Adventures\Support\Content` pour eviter les tableaux repetitifs.

Blocs :

```php
Content::paragraph('Texte court.');
Content::paragraphs(['Premier paragraphe.', 'Deuxieme paragraphe.']);
Content::narrative('secretsfamiliaux/manoir/tableaubrule/default');
Content::image('assets/img/secrets/tableau.png', 'un tableau', 'enigmelieu');
Content::linkedImage('assets/img/secrets/papier.png', 'un papier');
Content::comments();
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

Les objets d'inventaire sont declares dans la config du scenario quand ils doivent apparaitre dans les donnees communes.

Quand un objet contient des indices ou une interaction dediee, preferer une route propre :

```text
/aventures/{slug}/manoir/coffret
/aventures/{slug}/manoir/tableaubrule
```

Le footer peut alors pointer vers la route au lieu d'ouvrir seulement une image.

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

Elle peut etre omise pour un succes cache, mais le validateur emettra alors un avertissement.

## Validation

Utiliser le validateur avant de considerer une migration comme terminee :

```bash
php tools/validate_adventure.php secretsfamiliaux
php tools/validate_adventure.php --all
```

Le validateur signale les fichiers manquants, assets manquants, vues manquantes, succes sans image, et les `id` presents dans les contenus d'aventure.
