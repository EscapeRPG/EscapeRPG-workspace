# Checklist de migration d'un scenario

Cette checklist sert a migrer un ancien scenario natif vers le framework maison sans perdre de contenu ni casser l'ordre narratif.

## Preparation

- Identifier le dossier source dans `0_natif`.
- Identifier le slug cible du scenario.
- Creer ou verifier `config/adventures/{slug}.php`.
- Verifier le `content_path`.
- Lister les routes publiques attendues.
- Lister les scenes internes attendues.

## Pour chaque scene

- Le fichier de contenu existe.
- Toutes les variantes narratives de l'ancien code sont presentes.
- Tous les paragraphes visibles ont ete migres.
- Les textes longs ou purement narratifs sont externalises dans `content/adventures` quand cela ameliore la lisibilite.
- Les dialogues conservent le bon locuteur et le bon portrait.
- Les images visibles sont migrees.
- Les sons sont migres.
- Les actions et boutons existent.
- Les retours menent a la bonne scene.
- Les conditions d'affichage respectent l'ordre narratif.
- Les indices sont migres.
- Les reponses d'indices sont migrees.
- Les objets d'inventaire gagnes sont inchanges.
- Les notes et mots de passe recuperables sont inchanges.
- Les succes accordes sont inchanges.

## Hotspots et interactions

- Les hotspots utilisent `class` pour le style.
- Les hotspots utilisent `value` pour l'action metier.
- Les helpers `Content::hotspot`, `Content::action`, `Content::image` sont utilises quand ils rendent le fichier plus lisible.
- Aucun `id` n'est ajoute sauf besoin JS explicite.
- Les scripts interactifs utilisent des classes ou `data-*` quand c'est possible.
- Les zones de drop qui doivent etre identifiees par le moteur drag-and-drop gardent un `id`.

## Inventaire

- Chaque item attendu est declare.
- Chaque image d'item existe.
- Les objets simples ouvrent une image ou une lightbox.
- Les objets avec indices ou interaction ont une route dediee.
- Le footer ne cree pas d'IDs dupliques.

## Fins

- Toutes les fins natives sont conservees.
- Les textes adaptes a chaque fin sont conserves.
- Le score ou les etoiles sont affiches.
- La page finale est protegee par un state de fin.
- Une tentative d'acces premature propose un retour.
- Les commentaires fonctionnent via le handler commun.
- Les succes de fin sont accordes.

## Assets

- Les images de scene existent.
- Les images d'inventaire existent.
- Les sons existent.
- Les scripts declares existent.
- Les feuilles CSS declarees existent.
- Les images de succes existent dans `public/assets/img/succes/{slug}`.

## Verification finale

- Executer `php tools/validate_adventure.php {slug}`.
- Corriger les erreurs bloquantes.
- Relire les avertissements et decider s'ils sont acceptables.
- Faire un parcours manuel complet du scenario.
- Verifier les embranchements optionnels.
- Verifier les retours et pages verrouillees.
- Verifier les fins possibles.
