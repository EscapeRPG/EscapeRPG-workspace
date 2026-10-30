# Documentation des aventures

Pour créer ou compléter un scénario, commencer par le [guide pratique](adventure-authoring.md).

| Document | Usage |
| --- | --- |
| [Créer un scénario ou une scène](adventure-authoring.md) | Commandes, textes, boutons, transitions et checklist |
| [Scènes regroupées et carte](scene-modules.md) | Schéma des modules, handlers, effets et annotations de carte |
| [Conventions de contenu](adventure-content.md) | Blocs, Markdown, dialogues, hotspots, indices, inventaire et succès |
| [Format historique](adventure-authoring-legacy.md) | Modifier les scénarios qui ne sont pas encore migrés |

GAEA-1 utilise les scènes regroupées. Les nouveaux scénarios créés par la commande utilisent également ce format. Secrets Familiaux, Last Party, Ambria et Avent conservent leur organisation historique.

Depuis la racine du projet :

```bash
php tools/adventure.php --help
php tools/adventure.php new:scenario monaventure "Mon aventure"
php tools/adventure.php new:scene monaventure laboratoire "Laboratoire"
php tools/validate_adventure.php monaventure
php tools/adventure.php map monaventure
```

La carte est générée dans `var/adventure-maps/{slug}.html` et se consulte hors ligne. Elle est en lecture seule et doit être régénérée après modification du scénario.

Les commandes de création produisent une structure vide, sans récit ni transition inventés, et refusent l’écrasement des fichiers existants. Les exemples de création ci-dessus sont à exécuter seulement pour ajouter réellement ce scénario au projet.
