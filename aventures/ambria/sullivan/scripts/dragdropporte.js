let first,
	second,
	third,
	drop1 = document.getElementById('dropporte1'),
	drop2 = document.getElementById('dropporte2'),
	drop3 = document.getElementById('dropporte3'),
	drop4 = document.getElementById('dropporte4'),
	drop5 = document.getElementById('dropporte5'),
	drop6 = document.getElementById('dropporte6'),
	drag1 = document.getElementById('dra1'),
	drag2 = document.getElementById('dra2'),
	drag3 = document.getElementById('dra3'),
	audioporte = new Audio('/escaperpg/sons/ambria/porteciteouvre.mp3');

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
				this.className = 'dropperporte drop_hover'; // Et on applique le style adéquat à notre zone de drop quand un élément la survole
			});

			dropper.addEventListener('dragleave', function() {
				this.className = 'dropperporte'; // On revient au style de base lorsque l\'élément quitte la zone de drop
			});

			let dndHandler = this; // Cette variable est nécessaire pour que l\'événement « drop » ci-dessous accède facilement au namespace « dndHandler »

			dropper.addEventListener('drop', function(e) {
				e.preventDefault(); // On autorise le drop d\'éléments

				let target = e.target,
					draggedElement = dndHandler.draggedElement, // Récupération de l\'élément concerné
					clonedElement = draggedElement.cloneNode(true); // On créé immédiatement le clone de cet élément
					

				while (target.className.indexOf('dropperporte') == -1) { // Cette boucle permet de remonter jusqu\'à la zone de drop parente
					target = target.parentNode;
				}

				target.className = 'dropperporte'; // Application du style par défaut

				clonedElement = target.appendChild(clonedElement); // Ajout de l\'élément cloné à la zone de drop actuelle
				dndHandler.applyDragEvents(clonedElement); // Nouvelle application des événements qui ont été perdus lors du cloneNode()

				draggedElement.parentNode.removeChild(draggedElement); // Suppression de l\'élément d\'origine
				
				if (target == drop2 && clonedElement == dra2)
					{
						first = true;
					}
				else if (target == drop2 && clonedElement != dra2 || target != drop2 && clonedElement == dra2)
					{
						first = false;
					}
				if (target == drop4 && clonedElement == dra3)
					{
						second = true;
					}
				else if (target == drop4 && clonedElement != dra3 || target != drop4 && clonedElement == dra3)
					{
						second = false;
					}
				if (target == drop5 && clonedElement == dra1)
					{
						third = true;
					}
				else if (target == drop5 && clonedElement != dra1 || target != drop5 && clonedElement == dra1)
					{
						third = false;
					}
				if (first && second && third)
					{
						audioporte.play();
						
						alert("Vous entendez une série de cliquetis métalliques suivis d'un grondement faisant vibrer le sol, tandis que l'immense porte commence à se mouvoir.");
						document.location.href="cite.php";
					}
			});

		},
		
		applyDropdragEvents: function(draggable) {

			draggable.addEventListener('dragover', function(e) {
				e.preventDefault(); // On autorise le drop d\'éléments
				this.className = 'draggerporte drag_hover'; // Et on applique le style adéquat à notre zone de drop quand un élément la survole
			});

			draggable.addEventListener('dragleave', function() {
				this.className = 'draggerporte'; // On revient au style de base lorsque l\'élément quitte la zone de drop
			});

			let dndHandler = this; // Cette variable est nécessaire pour que l\'événement « drop » ci-dessous accède facilement au namespace « dndHandler »

			draggable.addEventListener('drop', function(e) {
				e.preventDefault(); // On autorise le drop d\'éléments

				let target = e.target,
					draggedElement = dndHandler.draggedElement, // Récupération de l\'élément concerné
					clonedElement = draggedElement.cloneNode(true); // On créé immédiatement le clone de cet élément
					

				while (target.className.indexOf('draggerporte') == -1) { // Cette boucle permet de remonter jusqu\'à la zone de drop parente
					target = target.parentNode;
				}

				target.className = 'draggerporte'; // Application du style par défaut

				clonedElement = target.appendChild(clonedElement); // Ajout de l\'élément cloné à la zone de drop actuelle
				dndHandler.applyDragEvents(clonedElement); // Nouvelle application des événements qui ont été perdus lors du cloneNode()

				draggedElement.parentNode.removeChild(draggedElement); // Suppression de l\'élément d\'origine
				
			});

		}

	};

	let elements = document.querySelectorAll('.draggerporte'),
		elementsLen = elements.length;

	for (let i = 0; i < elementsLen; i++) {
		dndHandler.applyDragEvents(elements[i]); // Application des paramètres nécessaires aux éléments déplaçables
	}

	let droppers = document.querySelectorAll('.dropperporte'),
		droppersLen = droppers.length;

	for (let i = 0; i < droppersLen; i++) {
		dndHandler.applyDropEvents(droppers[i]); // Application des événements nécessaires aux zones de drop
	}

	let draggables = document.querySelectorAll('.draggerporte'),
		draggablesLen = draggables.length;

	for (let i = 0; i < draggablesLen; i++) {
		dndHandler.applyDropdragEvents(draggables[i]); // Application des événements nécessaires aux zones de drag et drop d\'où proviennent les draggables d\'origine
	}
}

dragdrop();
