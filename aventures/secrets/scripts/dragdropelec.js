var first,
	second,
	third,
	fourth,
	fifth,
	sixth,
	seventh,
	eighth,
	nineth,
	tenth,
	eleventh,
	twelveth,
	thirteenth,
	fourteenth,
	fifteenth,
	sixteenth,
	seventeenth,
	eighteenth,
	nineteenth,
	twentieth,
	twentyfirst,
	twentysecond,
	twentythird,
	drop1 = document.getElementById('c1'),
	drop2 = document.getElementById('d1'),
	drop3 = document.getElementById('e1'),
	drop4 = document.getElementById('a2'),
	drop5 = document.getElementById('b2'),
	drop6 = document.getElementById('c2'),
	drop7 = document.getElementById('d2'),
	drop8 = document.getElementById('e2'),
	drop9 = document.getElementById('a3'),
	drop10 = document.getElementById('b3'),
	drop11 = document.getElementById('c3'),
	drop12 = document.getElementById('d3'),
	drop13 = document.getElementById('e3'),
	drop14 = document.getElementById('a4'),
	drop15 = document.getElementById('b4'),
	drop16 = document.getElementById('c4'),
	drop17 = document.getElementById('d4'),
	drop18 = document.getElementById('e4'),
	drop19 = document.getElementById('a5'),
	drop20 = document.getElementById('b5'),
	drop21 = document.getElementById('c5'),
	drop22 = document.getElementById('d5'),
	drop23 = document.getElementById('e5'),
	drag1 = document.getElementById('dra1'),
	drag2 = document.getElementById('dra2'),
	drag3 = document.getElementById('dra3'),
	drag4 = document.getElementById('dra4'),
	drag5 = document.getElementById('dra5'),
	drag6 = document.getElementById('dra6'),
	drag7 = document.getElementById('dra7'),
	drag8 = document.getElementById('dra8'),
	drag9 = document.getElementById('dra9'),
	drag10 = document.getElementById('dra10'),
	drag11 = document.getElementById('dra11'),
	drag12 = document.getElementById('dra12'),
	drag13 = document.getElementById('dra13'),
	drag14 = document.getElementById('dra14'),
	drag15 = document.getElementById('dra15'),
	drag16 = document.getElementById('dra16'),
	drag17 = document.getElementById('dra17'),
	drag18 = document.getElementById('dra18'),
	drag19 = document.getElementById('dra19'),
	drag20 = document.getElementById('dra20'),
	drag21 = document.getElementById('dra21'),
	drag22 = document.getElementById('dra22'),
	drag23 = document.getElementById('dra23');

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
				this.className = 'dropperelec drop_hover'; // Et on applique le style adéquat à notre zone de drop quand un élément la survole
			});

			dropper.addEventListener('dragleave', function() {
				this.className = 'dropperelec'; // On revient au style de base lorsque l\'élément quitte la zone de drop
			});

			var dndHandler = this; // Cette variable est nécessaire pour que l\'événement « drop » ci-dessous accède facilement au namespace « dndHandler »

			dropper.addEventListener('drop', function(e) {
				e.preventDefault(); // On autorise le drop d\'éléments

				var target = e.target,
					draggedElement = dndHandler.draggedElement, // Récupération de l\'élément concerné
					clonedElement = draggedElement.cloneNode(true); // On créé immédiatement le clone de cet élément
					

				while (target.className.indexOf('dropperelec') == -1) { // Cette boucle permet de remonter jusqu\'à la zone de drop parente
					target = target.parentNode;
				}

				target.className = 'dropperelec'; // Application du style par défaut

				clonedElement = target.appendChild(clonedElement); // Ajout de l\'élément cloné à la zone de drop actuelle
				dndHandler.applyDragEvents(clonedElement); // Nouvelle application des événements qui ont été perdus lors du cloneNode()

				draggedElement.parentNode.removeChild(draggedElement); // Suppression de l\'élément d\'origine
				
				if (target == drop1 && clonedElement == dra23)
					{
						first = true;
					}
				else if (target == drop1 && clonedElement != dra23 || target != drop1 && clonedElement == dra23)
					{
						first = false;
					}
				if (target == drop2 && clonedElement == dra8)
					{
						second = true;
					}
				else if (target == drop2 && clonedElement != dra8 || target != drop2 && clonedElement == dra8)
					{
						second = false;
					}
				if (target == drop3 && clonedElement == dra18)
					{
						third = true;
					}
				else if (target == drop3 && clonedElement != dra18 || target != drop3 && clonedElement == dra18)
					{
						third = false;
					}
				if (target == drop4 && clonedElement == dra5)
					{
						fourth = true;
					}
				else if (target == drop4 && clonedElement != dra5 || target != drop4 && clonedElement == dra5)
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
				if (target == drop6 && clonedElement == dra14)
					{
						sixth = true;
					}
				else if (target == drop6 && clonedElement != dra14 || target != drop6 && clonedElement == dra14)
					{
						sixth = false;
					}
				if (target == drop7 && clonedElement == dra9)
					{
						seventh = true;
					}
				else if (target == drop7 && clonedElement != dra9 || target != drop7 && clonedElement == dra9)
					{
						seventh = false;
					}
				if (target == drop8 && clonedElement == dra21)
					{
						eighth = true;
					}
				else if (target == drop8 && clonedElement != dra21 || target != drop8 && clonedElement == dra21)
					{
						eighth = false;
					}
				if (target == drop9 && clonedElement == dra2)
					{
						nineth = true;
					}
				else if (target == drop9 && clonedElement != dra2 || target != drop9 && clonedElement == dra2)
					{
						nineth = false;
					}
				if (target == drop10 && clonedElement == dra11)
					{
						tenth = true;
					}
				else if (target == drop10 && clonedElement != dra11 || target != drop10 && clonedElement == dra11)
					{
						tenth = false;
					}
				if (target == drop11 && clonedElement == dra20)
					{
						eleventh = true;
					}
				else if (target == drop11 && clonedElement != dra20 || target != drop11 && clonedElement == dra20)
					{
						eleventh = false;
					}
				if (target == drop12 && clonedElement == dra15)
					{
						twelveth = true;
					}
				else if (target == drop12 && clonedElement != dra15 || target != drop12 && clonedElement == dra15)
					{
						twelveth = false;
					}
				if (target == drop13 && clonedElement == dra6)
					{
						thirteenth = true;
					}
				else if (target == drop13 && clonedElement != dra6 || target != drop13 && clonedElement == dra6)
					{
						thirteenth = false;
					}
				if (target == drop14 && clonedElement == dra4)
					{
						fourteenth = true;
					}
				else if (target == drop14 && clonedElement != dra4 || target != drop14 && clonedElement == dra4)
					{
						fourteenth = false;
					}
				if (target == drop15 && clonedElement == dra19)
					{
						fifteenth = true;
					}
				else if (target == drop15 && clonedElement != dra19 || target != drop15 && clonedElement == dra19)
					{
						fifteenth = false;
					}
				if (target == drop16 && clonedElement == dra16)
					{
						sixteenth = true;
					}
				else if (target == drop16 && clonedElement != dra16 || target != drop16 && clonedElement == dra16)
					{
						sixteenth = false;
					}
				if (target == drop17 && clonedElement == dra22)
					{
						seventeenth = true;
					}
				else if (target == drop17 && clonedElement != dra22 || target != drop17 && clonedElement == dra22)
					{
						seventeenth = false;
					}
				if (target == drop18 && clonedElement == dra7)
					{
						eighteenth = true;
					}
				else if (target == drop18 && clonedElement != dra7 || target != drop18 && clonedElement == dra7)
					{
						eighteenth = false;
					}
				if (target == drop19 && clonedElement == dra17)
					{
						nineteenth = true;
					}
				else if (target == drop19 && clonedElement != dra17 || target != drop19 && clonedElement == dra17)
					{
						nineteenth = false;
					}
				if (target == drop20 && clonedElement == dra12)
					{
						twentieth = true;
					}
				else if (target == drop20 && clonedElement != dra12 || target != drop20 && clonedElement == dra12)
					{
						twentieth = false;
					}
				if (target == drop21 && clonedElement == dra13)
					{
						twentyfirst = true;
					}
				else if (target == drop21 && clonedElement != dra13 || target != drop21 && clonedElement == dra13)
					{
						twentyfirst = false;
					}
				if (target == drop22 && clonedElement == dra3)
					{
						twentysecond = true;
					}
				else if (target == drop22 && clonedElement != dra3 || target != drop22 && clonedElement == dra3)
					{
						twentysecond = false;
					}
				if (target == drop23 && clonedElement == dra10)
					{
						twentythird = true;
					}
				else if (target == drop23 && clonedElement != dra10 || target != drop23 && clonedElement == dra10)
					{
						twentythird = false;
					}
				if (first && second && third && fourth && fifth && sixth && seventh && eighth && nineth && tenth && eleventh && twelveth && thirteenth && fourteenth && fifteenth && sixteenth && seventeenth && eighteenth && nineteenth && twentieth && twentyfirst && twentysecond && twentythird)
					{
						alert("Le bourdonnement rassurant de l\'électricité semble revenir.");
						document.location.href="cuves.php";
					}
			});

		},
		
		applyDropdragEvents: function(draggable) {

			draggable.addEventListener('dragover', function(e) {
				e.preventDefault(); // On autorise le drop d\'éléments
				this.className = 'draggableelec drag_hover'; // Et on applique le style adéquat à notre zone de drop quand un élément la survole
			});

			draggable.addEventListener('dragleave', function() {
				this.className = 'draggableelec'; // On revient au style de base lorsque l\'élément quitte la zone de drop
			});

			var dndHandler = this; // Cette variable est nécessaire pour que l\'événement « drop » ci-dessous accède facilement au namespace « dndHandler »

			draggable.addEventListener('drop', function(e) {
				e.preventDefault(); // On autorise le drop d\'éléments

				var target = e.target,
					draggedElement = dndHandler.draggedElement, // Récupération de l\'élément concerné
					clonedElement = draggedElement.cloneNode(true); // On créé immédiatement le clone de cet élément
					

				while (target.className.indexOf('draggableelec') == -1) { // Cette boucle permet de remonter jusqu\'à la zone de drop parente
					target = target.parentNode;
				}

				target.className = 'draggableelec'; // Application du style par défaut

				clonedElement = target.appendChild(clonedElement); // Ajout de l\'élément cloné à la zone de drop actuelle
				dndHandler.applyDragEvents(clonedElement); // Nouvelle application des événements qui ont été perdus lors du cloneNode()

				draggedElement.parentNode.removeChild(draggedElement); // Suppression de l\'élément d\'origine
				
			});

		}

	};

	var elements = document.querySelectorAll('.draggableelec'),
		elementsLen = elements.length;

	for (var i = 0; i < elementsLen; i++) {
		dndHandler.applyDragEvents(elements[i]); // Application des paramètres nécessaires aux éléments déplaçables
	}

	var droppers = document.querySelectorAll('.dropperelec'),
		droppersLen = droppers.length;

	for (var i = 0; i < droppersLen; i++) {
		dndHandler.applyDropEvents(droppers[i]); // Application des événements nécessaires aux zones de drop
	}

	var draggables = document.querySelectorAll('.draggableelec'),
		draggablesLen = draggables.length;

	for (var i = 0; i < draggablesLen; i++) {
		dndHandler.applyDropdragEvents(draggables[i]); // Application des événements nécessaires aux zones de drag et drop d\'où proviennent les draggables d\'origine
	}
}

dragdrop();