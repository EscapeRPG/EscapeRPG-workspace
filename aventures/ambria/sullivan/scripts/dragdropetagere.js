let first,
	second,
	third,
	fourth,
	fifth,
	sixth,
	drop1 = document.getElementById('dropetagere1'),
	drop2 = document.getElementById('dropetagere2'),
	drop3 = document.getElementById('dropetagere3'),
	drop4 = document.getElementById('dropetagere4'),
	drop5 = document.getElementById('dropetagere5'),
	drop6 = document.getElementById('dropetagere6'),
	drop7 = document.getElementById('dropetagere7'),
	drop8 = document.getElementById('dropetagere8'),
	drop9 = document.getElementById('dropetagere9'),
	drop10 = document.getElementById('dropetagere10'),
	drag1 = document.getElementById('dra1'),
	drag2 = document.getElementById('dra2'),
	drag3 = document.getElementById('dra3'),
	drag4 = document.getElementById('dra4'),
	drag5 = document.getElementById('dra5'),
	drag6 = document.getElementById('dra6'),
	audio2 = new Audio('/escaperpg/sons/ambria/armoirefermer.mp3');

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
				this.className = 'dropperetagere drop_hover'; // Et on applique le style adéquat à notre zone de drop quand un élément la survole
			});

			dropper.addEventListener('dragleave', function() {
				this.className = 'dropperetagere'; // On revient au style de base lorsque l\'élément quitte la zone de drop
			});

			let dndHandler = this; // Cette variable est nécessaire pour que l\'événement « drop » ci-dessous accède facilement au namespace « dndHandler »

			dropper.addEventListener('drop', function(e) {
				e.preventDefault(); // On autorise le drop d\'éléments

				let target = e.target,
					draggedElement = dndHandler.draggedElement, // Récupération de l\'élément concerné
					clonedElement = draggedElement.cloneNode(true); // On créé immédiatement le clone de cet élément
					

				while (target.className.indexOf('dropperetagere') == -1) { // Cette boucle permet de remonter jusqu\'à la zone de drop parente
					target = target.parentNode;
				}

				target.className = 'dropperetagere'; // Application du style par défaut

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
				if (target == drop2 && clonedElement == dra6)
					{
						second = true;
					}
				else if (target == drop2 && clonedElement != dra6 || target != drop2 && clonedElement == dra6)
					{
						second = false;
					}
				if (target == drop3 && clonedElement == dra3)
					{
						third = true;
					}
				else if (target == drop3 && clonedElement != dra3 || target != drop3 && clonedElement == dra3)
					{
						third = false;
					}
				if (target == drop4 && clonedElement == dra4)
					{
						fourth = true;
					}
				else if (target == drop4 && clonedElement != dra4 || target != drop4 && clonedElement == dra4)
					{
						fourth = false;
					}
				if (target == drop5 && clonedElement == dra1)
					{
						fifth = true;
					}
				else if (target == drop5 && clonedElement != dra1 || target != drop5 && clonedElement == dra1)
					{
						fifth = false;
					}
				if (target == drop10 && clonedElement == dra2)
					{
						sitxh = true;
					}
				else if (target == drop10 && clonedElement != dra2 || target != drop10 && clonedElement == dra2)
					{
						sitxh = false;
					}
				if (first && second && third && fourth && fifth && sitxh)
					{
						audio2.play();
						
						alert("Vous êtes satisfait de votre rangement et refermez l'étagère à clé.");
						document.location.href="flots/flots.php";
					}
			});

		},
		
		applyDropdragEvents: function(draggable) {

			draggable.addEventListener('dragover', function(e) {
				e.preventDefault(); // On autorise le drop d\'éléments
				this.className = 'draggeretagere drag_hover'; // Et on applique le style adéquat à notre zone de drop quand un élément la survole
			});

			draggable.addEventListener('dragleave', function() {
				this.className = 'draggeretagere'; // On revient au style de base lorsque l\'élément quitte la zone de drop
			});

			let dndHandler = this; // Cette variable est nécessaire pour que l\'événement « drop » ci-dessous accède facilement au namespace « dndHandler »

			draggable.addEventListener('drop', function(e) {
				e.preventDefault(); // On autorise le drop d\'éléments

				let target = e.target,
					draggedElement = dndHandler.draggedElement, // Récupération de l\'élément concerné
					clonedElement = draggedElement.cloneNode(true); // On créé immédiatement le clone de cet élément
					

				while (target.className.indexOf('draggeretagere') == -1) { // Cette boucle permet de remonter jusqu\'à la zone de drop parente
					target = target.parentNode;
				}

				target.className = 'draggeretagere'; // Application du style par défaut

				clonedElement = target.appendChild(clonedElement); // Ajout de l\'élément cloné à la zone de drop actuelle
				dndHandler.applyDragEvents(clonedElement); // Nouvelle application des événements qui ont été perdus lors du cloneNode()

				draggedElement.parentNode.removeChild(draggedElement); // Suppression de l\'élément d\'origine
				
			});

		}

	};

	let elements = document.querySelectorAll('.draggeretagere'),
		elementsLen = elements.length;

	for (let i = 0; i < elementsLen; i++) {
		dndHandler.applyDragEvents(elements[i]); // Application des paramètres nécessaires aux éléments déplaçables
	}

	let droppers = document.querySelectorAll('.dropperetagere'),
		droppersLen = droppers.length;

	for (let i = 0; i < droppersLen; i++) {
		dndHandler.applyDropEvents(droppers[i]); // Application des événements nécessaires aux zones de drop
	}

	let draggables = document.querySelectorAll('.draggeretagere'),
		draggablesLen = draggables.length;

	for (let i = 0; i < draggablesLen; i++) {
		dndHandler.applyDropdragEvents(draggables[i]); // Application des événements nécessaires aux zones de drag et drop d\'où proviennent les draggables d\'origine
	}
}

dragdrop();
