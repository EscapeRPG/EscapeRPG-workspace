let cercle1,
	cercle2,
	cercle3,
	cercle4,
	cercle5,
	cercle6,
	cercle7,
	cercle8,
	cercle9,
	cercle10,
	cercle11,
	cercle12,
	cercle13,
	cercle14,
	drop1 = document.getElementById('symb1'),
	drop2 = document.getElementById('symb2'),
	drop3 = document.getElementById('symb3'),
	drop4 = document.getElementById('symb4'),
	drop5 = document.getElementById('symb5'),
	drop6 = document.getElementById('symb6'),
	drop7 = document.getElementById('symb7'),
	drop8 = document.getElementById('symb8'),
	drop9 = document.getElementById('symb9'),
	drop10 = document.getElementById('symb10'),
	drop11 = document.getElementById('symb11'),
	drop12 = document.getElementById('symb12'),
	drop13 = document.getElementById('symb13'),
	drop14 = document.getElementById('symb14'),
	drag1 = document.getElementById('mag1'),
	drag2 = document.getElementById('mag2'),
	drag3 = document.getElementById('mag3'),
	drag4 = document.getElementById('mag4'),
	drag5 = document.getElementById('mag5'),
	drag6 = document.getElementById('mag6'),
	drag7 = document.getElementById('mag7'),
	drag8 = document.getElementById('mag8'),
	drag9 = document.getElementById('mag9'),
	drag10 = document.getElementById('mag10'),
	drag11 = document.getElementById('mag11'),
	drag12 = document.getElementById('mag12'),
	drag13 = document.getElementById('mag13'),
	drag14 = document.getElementById('mag14');

function dragdrop() {

	let dndHandler = {

		draggedElement: null, // Propriété pointant vers l'élément en cours de déplacement

		applyDragEvents: function(element) {

			element.draggable = true;

			let dndHandler = this; // Cette variable est nécessaire pour que l'événement « dragstart » ci-dessous accède facilement au namespace « dndHandler »

			element.addEventListener('dragstart', function(e) {
				dndHandler.draggedElement = e.target; // On sauvegarde l'élément en cours de déplacement
				e.dataTransfer.setData('text/plain', ''); // Nécessaire pour Firefox
			});

		},

		applyDropEvents: function(dropper) {

			dropper.addEventListener('dragover', function(e) {
				e.preventDefault(); // On autorise le drop d'éléments
				this.className = 'droppercercle drop_hover'; // Et on applique le style adéquat à notre zone de drop quand un élément la survole
			});

			dropper.addEventListener('dragleave', function() {
				this.className = 'droppercercle'; // On revient au style de base lorsque l'élément quitte la zone de drop
			});

			let dndHandler = this; // Cette variable est nécessaire pour que l'événement « drop » ci-dessous accède facilement au namespace « dndHandler »

			dropper.addEventListener('drop', function(e) {
				e.preventDefault(); // On autorise le drop d'éléments

				let target = e.target,
					draggedElement = dndHandler.draggedElement, // Récupération de l'élément concerné
					clonedElement = draggedElement.cloneNode(true); // On créé immédiatement le clone de cet élément
					

				while (target.className.indexOf('droppercercle') == -1) { // Cette boucle permet de remonter jusqu'à la zone de drop parente
					target = target.parentNode;
				}

				target.className = 'droppercercle'; // Application du style par défaut

				clonedElement = target.appendChild(clonedElement); // Ajout de l'élément cloné à la zone de drop actuelle
				dndHandler.applyDragEvents(clonedElement); // Nouvelle application des événements qui ont été perdus lors du cloneNode()

				draggedElement.parentNode.removeChild(draggedElement); // Suppression de l'élément d'origine
				
				if (target == drop1 && clonedElement == mag4)
					{
						cercle1 = true;
					}
				else if (target == drop1 && clonedElement != mag4 || target != drop1 && clonedElement == mag4)
					{
						cercle1 = false;
					}
				if (target == drop2 && clonedElement == mag6)
					{
						cercle2 = true;
					}
				else if (target == drop2 && clonedElement != mag6 || target != drop2 && clonedElement == mag6)
					{
						cercle2 = false;
					}
				if (target == drop3 && clonedElement == mag7)
					{
						cercle3 = true;
					}
				else if (target == drop3 && clonedElement != mag7 || target != drop3 && clonedElement == mag7)
					{
						cercle3 = false;
					}
				if (target == drop4 && clonedElement == mag13)
					{
						cercle4 = true;
					}
				else if (target == drop4 && clonedElement != mag13 || target != drop4 && clonedElement == mag13)
					{
						cercle4 = false;
					}
				if (target == drop5 && clonedElement == mag1)
					{
						cercle5 = true;
					}
				else if (target == drop5 && clonedElement != mag1 || target != drop5 && clonedElement == mag1)
					{
						cercle5 = false;
					}
				if (target == drop6 && clonedElement == mag11)
					{
						cercle6 = true;
					}
				else if (target == drop6 && clonedElement != mag11 || target != drop6 && clonedElement == mag11)
					{
						cercle6 = false;
					}
				if (target == drop7 && clonedElement == mag3)
					{
						cercle7 = true;
					}
				else if (target == drop7 && clonedElement != mag3 || target != drop7 && clonedElement == mag3)
					{
						cercle7 = false;
					}
				if (target == drop8 && clonedElement == mag8)
					{
						cercle8 = true;
					}
				else if (target == drop8 && clonedElement != mag8 || target != drop8 && clonedElement == mag8)
					{
						cercle8 = false;
					}
				if (target == drop9 && clonedElement == mag12)
					{
						cercle9 = true;
					}
				else if (target == drop9 && clonedElement != mag12 || target != drop9 && clonedElement == mag12)
					{
						cercle9 = false;
					}
				if (target == drop10 && clonedElement == mag14)
					{
						cercle10 = true;
					}
				else if (target == drop10 && clonedElement != mag14 || target != drop10 && clonedElement == mag14)
					{
						cercle10 = false;
					}
				if (target == drop11 && clonedElement == mag2)
					{
						cercle11 = true;
					}
				else if (target == drop11 && clonedElement != mag2 || target != drop11 && clonedElement == mag2)
					{
						cercle11 = false;
					}
				if (target == drop12 && clonedElement == mag9)
					{
						cercle12 = true;
					}
				else if (target == drop12 && clonedElement != mag9 || target != drop12 && clonedElement == mag9)
					{
						cercle12 = false;
					}
				if (target == drop13 && clonedElement == mag5)
					{
						cercle13 = true;
					}
				else if (target == drop13 && clonedElement != mag5 || target != drop13 && clonedElement == mag5)
					{
						cercle13 = false;
					}
				if (target == drop14 && clonedElement == mag10)
					{
						cercle14 = true;
					}
				else if (target == drop14 && clonedElement != mag10 || target != drop14 && clonedElement == mag10)
					{
						cercle14 = false;
					}
				if (cercle1 && cercle2 && cercle3 && cercle4 && cercle5 && cercle6 && cercle7 && cercle8 && cercle9 && cercle10 && cercle11 && cercle12 && cercle13 && cercle14)
					{
						alert("L'air vibre autour de vous alors que le cercle que vous avez tracé s'illumine.");
						document.location.href="../ends/4qp32s.php";
					}
			});

		},
		
		applyDropdragEvents: function(draggable) {

			draggable.addEventListener('dragover', function(e) {
				e.preventDefault(); // On autorise le drop d'éléments
				this.className = 'draggablecercle drag_hover'; // Et on applique le style adéquat à notre zone de drop quand un élément la survole
			});

			draggable.addEventListener('dragleave', function() {
				this.className = 'draggablecercle'; // On revient au style de base lorsque l'élément quitte la zone de drop
			});

			let dndHandler = this; // Cette variable est nécessaire pour que l'événement « drop » ci-dessous accède facilement au namespace « dndHandler »

			draggable.addEventListener('drop', function(e) {
				e.preventDefault(); // On autorise le drop d'éléments

				let target = e.target,
					draggedElement = dndHandler.draggedElement, // Récupération de l'élément concerné
					clonedElement = draggedElement.cloneNode(true); // On créé immédiatement le clone de cet élément
					

				while (target.className.indexOf('draggablecercle') == -1) { // Cette boucle permet de remonter jusqu'à la zone de drop parente
					target = target.parentNode;
				}

				target.className = 'draggablecercle'; // Application du style par défaut

				clonedElement = target.appendChild(clonedElement); // Ajout de l'élément cloné à la zone de drop actuelle
				dndHandler.applyDragEvents(clonedElement); // Nouvelle application des événements qui ont été perdus lors du cloneNode()

				draggedElement.parentNode.removeChild(draggedElement); // Suppression de l'élément d'origine
				
			});

		}

	};

	let elements = document.querySelectorAll('.draggablecercle'),
		elementsLen = elements.length;

	for (let i = 0; i < elementsLen; i++) {
		dndHandler.applyDragEvents(elements[i]); // Application des paramètres nécessaires aux éléments déplaçables
	}

	let droppers = document.querySelectorAll('.droppercercle'),
		droppersLen = droppers.length;

	for (let i = 0; i < droppersLen; i++) {
		dndHandler.applyDropEvents(droppers[i]); // Application des événements nécessaires aux zones de drop
	}

	let draggables = document.querySelectorAll('.draggablecercle'),
		draggablesLen = draggables.length;

	for (let i = 0; i < draggablesLen; i++) {
		dndHandler.applyDropdragEvents(draggables[i]); // Application des événements nécessaires aux zones de drag et drop d'où proviennent les draggables d'origine
	}
}

dragdrop();
