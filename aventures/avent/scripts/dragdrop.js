var gauche,
	drop1 = document.getElementById('drop1'),
	drop2 = document.getElementById('drop2'),
	drop3 = document.getElementById('drop3'),
	drop4 = document.getElementById('drop4'),
	drag1 = document.getElementById('dra1');

function dragdrop() {

	var dndHandler = {

		draggedElement: null, // Propriété pointant vers l\'élément en cours de déplacement

		applyDragEvents: function(element) {

			element.draggable = true;

			var dndHandler = this; // Cette variable est nécessaire pour que l\'événement « dragstart » ci-dessous accède facilement au namespace « dndHandler »

			element.addEventListener('dragstart', function(e) {
				dndHandler.draggedElement = e.target; // On sauvegarde l\'élément en cours de déplacement
				e.dataTransfer.setData('text/plain', ''); // Nécessaire pour Firefox
			});

		},

		applyDropEvents: function(dropper) {

			dropper.addEventListener('dragover', function(e) {
				e.preventDefault(); // On autorise le drop d\'éléments
				this.className = 'dropper drop_hover'; // Et on applique le style adéquat à notre zone de drop quand un élément la survole
			});

			dropper.addEventListener('dragleave', function() {
				this.className = 'dropper'; // On revient au style de base lorsque l\'élément quitte la zone de drop
			});

			var dndHandler = this; // Cette variable est nécessaire pour que l\'événement « drop » ci-dessous accède facilement au namespace « dndHandler »

			dropper.addEventListener('drop', function(e) {
				e.preventDefault(); // On autorise le drop d\'éléments

				var target = e.target,
					draggedElement = dndHandler.draggedElement, // Récupération de l\'élément concerné
					clonedElement = draggedElement.cloneNode(true); // On créé immédiatement le clone de cet élément
					

				while (target.className.indexOf('dropper') == -1) { // Cette boucle permet de remonter jusqu\'à la zone de drop parente
					target = target.parentNode;
				}

				target.className = 'dropper'; // Application du style par défaut

				clonedElement = target.appendChild(clonedElement); // Ajout de l\'élément cloné à la zone de drop actuelle
				dndHandler.applyDragEvents(clonedElement); // Nouvelle application des événements qui ont été perdus lors du cloneNode()

				draggedElement.parentNode.removeChild(draggedElement); // Suppression de l\'élément d\'origine
				
				if (target == drop2 && clonedElement == dra1)
					{
						gauche = true;
					}
				else if (target == drop2 && clonedElement != dra1 || target != drop2 && clonedElement == dra1)
					{
						gauche = false;
					}
				if (gauche)
					{
						alert("La pièce s'imbrique parfaitement.");
						document.location.href="reparations2.php";
					}
			});

		},
		
		applyDropdragEvents: function(draggable) {

			draggable.addEventListener('dragover', function(e) {
				e.preventDefault(); // On autorise le drop d\'éléments
				this.className = 'draggable drag_hover'; // Et on applique le style adéquat à notre zone de drop quand un élément la survole
			});

			draggable.addEventListener('dragleave', function() {
				this.className = 'draggable'; // On revient au style de base lorsque l\'élément quitte la zone de drop
			});

			var dndHandler = this; // Cette variable est nécessaire pour que l\'événement « drop » ci-dessous accède facilement au namespace « dndHandler »

			draggable.addEventListener('drop', function(e) {
				e.preventDefault(); // On autorise le drop d\'éléments

				var target = e.target,
					draggedElement = dndHandler.draggedElement, // Récupération de l\'élément concerné
					clonedElement = draggedElement.cloneNode(true); // On créé immédiatement le clone de cet élément
					

				while (target.className.indexOf('draggable') == -1) { // Cette boucle permet de remonter jusqu\'à la zone de drop parente
					target = target.parentNode;
				}

				target.className = 'draggable'; // Application du style par défaut

				clonedElement = target.appendChild(clonedElement); // Ajout de l\'élément cloné à la zone de drop actuelle
				dndHandler.applyDragEvents(clonedElement); // Nouvelle application des événements qui ont été perdus lors du cloneNode()

				draggedElement.parentNode.removeChild(draggedElement); // Suppression de l\'élément d\'origine
				
			});

		}

	};

	var elements = document.querySelectorAll('.draggable'),
		elementsLen = elements.length;

	for (var i = 0; i < elementsLen; i++) {
		dndHandler.applyDragEvents(elements[i]); // Application des paramètres nécessaires aux éléments déplaçables
	}

	var droppers = document.querySelectorAll('.dropper'),
		droppersLen = droppers.length;

	for (var i = 0; i < droppersLen; i++) {
		dndHandler.applyDropEvents(droppers[i]); // Application des événements nécessaires aux zones de drop
	}

	var draggables = document.querySelectorAll('.draggable'),
		draggablesLen = draggables.length;

	for (var i = 0; i < draggablesLen; i++) {
		dndHandler.applyDropdragEvents(draggables[i]); // Application des événements nécessaires aux zones de drag et drop d\'où proviennent les draggables d\'origine
	}
}

dragdrop();