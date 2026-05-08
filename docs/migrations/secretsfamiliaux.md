# Migration Secrets Familiaux

Scenario cible : `secretsfamiliaux`

Commande de validation :

```bash
php tools/validate_adventure.php secretsfamiliaux
```

## Points deja traites

- Architecture de scenes migree vers le framework maison.
- Page finale dediee avec protection par state.
- Fins multiples conservees avec variantes et etoiles.
- Commentaires de fin factorises via un handler commun.
- Tableau brule transforme en route dediee d'inventaire.
- Indices du tableau brule remis dans la route dediee.
- Indices de chambre conditionnes apres la visite de Pellington.
- IDs de style convertis en classes quand ils ne servent pas a la logique JS/metier.
- Images de succes deplacees vers `public/assets/img/succes/secretsfamiliaux`.
- Premier exemple de texte narratif externalise : `content/adventures/secretsfamiliaux/manoir/tableaubrule`.
- Premier exemple de helpers de contenu : `app/Content/Adventures/SecretsFamiliaux/manoir/tableaubrule.php`.

## Points a verifier manuellement

- Parcours complet de nuit jusqu'au matin.
- Ordre exact d'apparition des indices lies a Pellington.
- Acces au coffret depuis l'inventaire.
- Acces au tableau brule depuis l'inventaire.
- Resolution du coffre.
- Resolution du coffret.
- Resolution du cercle rituel.
- Resolution du panneau electrique.
- Quatre fins possibles.
- Acces premature a la page finale.
- Attribution des succes.

## Notes

Le scenario a un ordre narratif strict. Toute remise en place d'indice doit etre verifiee contre l'etat joueur attendu, pas seulement contre la presence du texte dans l'ancien code.
