let first,
	second,
	third,
	drop1 = document.getElementById('dropnoeud1'),
	drop2 = document.getElementById('dropnoeud2'),
	drop3 = document.getElementById('dropnoeud3'),
	drag1 = document.getElementById('dra1'),
	drag2 = document.getElementById('dra2'),
	drag3 = document.getElementById('dra3'),
	drag4 = document.getElementById('dra4'),
	drag5 = document.getElementById('dra5'),
	drag6 = document.getElementById('dra6'),
	drag7 = document.getElementById('dra7'),
	drag8 = document.getElementById('dra8');

function dragdrop() {

	let dndHandler = {

		draggedElement: null, // Propriété pointant vers l\'élément en cours de déplacement

		applyDragEvents: function(element) {

			element.draggable = true;

			let dndHandler = this; // Cette variable est nécessaire pour que l\'événement « dragstart » ci-dessous accède facilement au namespace « dndHandler »

			element.addEventListener('dragstart', function(e) {
				dndHandler.draggedElement = e.target; // On sauvegarde l\'élément en cours de déplacement
				e.dataTransfer.setData('text/plain', ''); // Nécessaire pour Firefox
			});

		},

		applyDropEvents: function(dropper) {

			dropper.addEventListener('dragover', function(e) {
				e.preventDefault(); // On autorise le drop d\'éléments
				this.className = 'droppernoeud drop_hover'; // Et on applique le style adéquat à notre zone de drop quand un élément la survole
			});

			dropper.addEventListener('dragleave', function() {
				this.className = 'droppernoeud'; // On revient au style de base lorsque l\'élément quitte la zone de drop
			});

			let dndHandler = this; // Cette variable est nécessaire pour que l\'événement « drop » ci-dessous accède facilement au namespace « dndHandler »

			dropper.addEventListener('drop', function(e) {
				e.preventDefault(); // On autorise le drop d\'éléments

				let target = e.target,
					draggedElement = dndHandler.draggedElement, // Récupération de l\'élément concerné
					clonedElement = draggedElement.cloneNode(true); // On créé immédiatement le clone de cet élément
					

				while (target.className.indexOf('droppernoeud') == -1) { // Cette boucle permet de remonter jusqu\'à la zone de drop parente
					target = target.parentNode;
				}

				target.className = 'droppernoeud'; // Application du style par défaut

				clonedElement = target.appendChild(clonedElement); // Ajout de l\'élément cloné à la zone de drop actuelle
				dndHandler.applyDragEvents(clonedElement); // Nouvelle application des événements qui ont été perdus lors du cloneNode()

				draggedElement.parentNode.removeChild(draggedElement); // Suppression de l\'élément d\'origine
				
				if (target == drop1 && clonedElement == dra5)
					{
						first = true;
					}
				else if (target == drop1 && clonedElement != dra5 || target != drop1 && clonedElement == dra5)
					{
						first = false;
					}
				if (target == drop2 && clonedElement == dra3)
					{
						second = true;
					}
				else if (target == drop2 && clonedElement != dra3 || target != drop2 && clonedElement == dra3)
					{
						second = false;
					}
				if (target == drop3 && clonedElement == dra8)
					{
						third = true;
					}
				else if (target == drop3 && clonedElement != dra8 || target != drop3 && clonedElement == dra8)
					{
						third = false;
					}
			});

		},
		
		applyDropdragEvents: function(draggable) {

			draggable.addEventListener('dragover', function(e) {
				e.preventDefault(); // On autorise le drop d\'éléments
				this.className = 'draggernoeud drag_hover'; // Et on applique le style adéquat à notre zone de drop quand un élément la survole
			});

			draggable.addEventListener('dragleave', function() {
				this.className = 'draggernoeud'; // On revient au style de base lorsque l\'élément quitte la zone de drop
			});

			let dndHandler = this; // Cette variable est nécessaire pour que l\'événement « drop » ci-dessous accède facilement au namespace « dndHandler »

			draggable.addEventListener('drop', function(e) {
				e.preventDefault(); // On autorise le drop d\'éléments

				let target = e.target,
					draggedElement = dndHandler.draggedElement, // Récupération de l\'élément concerné
					clonedElement = draggedElement.cloneNode(true); // On créé immédiatement le clone de cet élément
					

				while (target.className.indexOf('draggernoeud') == -1) { // Cette boucle permet de remonter jusqu\'à la zone de drop parente
					target = target.parentNode;
				}

				target.className = 'draggernoeud'; // Application du style par défaut

				clonedElement = target.appendChild(clonedElement); // Ajout de l\'élément cloné à la zone de drop actuelle
				dndHandler.applyDragEvents(clonedElement); // Nouvelle application des événements qui ont été perdus lors du cloneNode()

				draggedElement.parentNode.removeChild(draggedElement); // Suppression de l\'élément d\'origine
				
			});

		}

	};

	let elements = document.querySelectorAll('.draggernoeud'),
		elementsLen = elements.length;

	for (let i = 0; i < elementsLen; i++) {
		dndHandler.applyDragEvents(elements[i]); // Application des paramètres nécessaires aux éléments déplaçables
	}

	let droppers = document.querySelectorAll('.droppernoeud'),
		droppersLen = droppers.length;

	for (let i = 0; i < droppersLen; i++) {
		dndHandler.applyDropEvents(droppers[i]); // Application des événements nécessaires aux zones de drop
	}

	let draggables = document.querySelectorAll('.draggernoeud'),
		draggablesLen = draggables.length;

	for (let i = 0; i < draggablesLen; i++) {
		dndHandler.applyDropdragEvents(draggables[i]); // Application des événements nécessaires aux zones de drag et drop d\'où proviennent les draggables d\'origine
	}
}

dragdrop();

function check()
{
	if (first && second && third)
		{
			alert("Le type étudie vos nœuds et se redresse vers vous, un large sourire aux lèvres.");
			document.location.href="flots/flots.php";
		}
	else
		{
			alert("Le type étudie vos nœuds et se redresse vers vous, les sourcils froncés.");
			document.location.href="flots/flots2.php";
		}
}
