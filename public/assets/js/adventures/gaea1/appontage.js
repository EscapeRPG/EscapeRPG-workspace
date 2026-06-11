(() => {
    const root = document.querySelector('.appontage-console');
    if (!root) {
        return;
    }

    const imageBase = (root.dataset.appontageImageBase || '/assets/img/gaea1/appontage/').replace(/\/?$/, '/');
    const soundBase = (root.dataset.appontageSoundBase || '/assets/sounds/gaea1/').replace(/\/?$/, '/');
    const completeForm = document.getElementById('appontage-complete-form');
    const message = document.getElementById('bulleappontage');
    const counter = document.getElementById('compteur');
    const distanceValue = document.getElementById('valdist');
    const hangar = document.getElementById('hangar');
    const thrusters = document.getElementById('thrusters');
    const propulsors = document.getElementById('propulseurs');
    const propulsorImage = document.getElementById('propulimg');
    const attitudeImage = document.getElementById('assietteimg');
    const stick = document.getElementById('manche');
    const leftJoystick = document.getElementById('joystick_gauche');
    const rightJoystick = document.getElementById('joystick_droite');
    const landingGearButton = document.getElementById('trainsatterrissage');
    const collisionControls = document.getElementById('controlscoll');
    const secondCollisionControls = document.getElementById('controls2coll');
    const collisionIndicator = document.getElementById('collactif');
    const firstCollisionMarker = document.getElementById('croixrouge');
    const secondCollisionMarker = document.getElementById('croixrouge2');
    const validCollisionMarker = document.getElementById('croixverte');
    const engineButton = document.getElementById('moteursbtn');

    const sounds = {
        hangar: audio('hangar.mp3', true),
        stabilizers: audio('stabilisateurs.mp3', true),
        beep: audio('beep.mp3', true),
        propulsors: audio('propulseurs.mp3'),
        stabs: audio('stabs.mp3'),
        gear: audio('trains.mp3'),
        engineStop: audio('moteursstop.mp3'),
    };

    const state = {
        descentTimer: null,
        engineTimer: null,
        distance: 10,
        hangarY: 0,
        hangarX: 0,
        scale: 1,
        attitude: 0,
        propulsorsOff: false,
        gearOut: false,
        firstCollision: { x: 0, y: 0 },
        secondCollision: { x: 0, y: 0 },
        attitudePending: false,
        stopped: false,
    };

    const collisionSteps = {
        1: {
            controls: collisionControls,
            marker: firstCollisionMarker,
            vector: state.firstCollision,
            target: { x: 60, y: 40 },
            solvedMessage: 'Surface stable, vous pouvez reprendre.',
        },
        2: {
            controls: secondCollisionControls,
            marker: secondCollisionMarker,
            vector: state.secondCollision,
            target: { x: -20, y: -10 },
            solvedMessage: 'Collision évitée, beau travail ! Vous pouvez reprendre la descente.',
        },
    };

    setDistance(10);
    play(sounds.hangar);

    thrusters.addEventListener('pointerdown', startDescent);
    ['pointerup', 'pointerleave', 'pointercancel'].forEach((eventName) => {
        thrusters.addEventListener(eventName, stopDescent);
    });

    propulsors.addEventListener('click', () => {
        play(sounds.propulsors);
        state.propulsorsOff = true;
        propulsorImage.src = imageBase + 'propulseursoff.png';
        propulsors.classList.add('eventsoff');
        setMessage('Propulseurs éteints, poursuivez la manœuvre.');
    });

    [leftJoystick, rightJoystick].forEach((button) => {
        button.addEventListener('click', () => adjustAttitude(Number(button.dataset.appontageTilt || 0)));
    });

    landingGearButton.addEventListener('click', () => {
        play(sounds.gear);
        stop(sounds.beep);
        state.gearOut = true;
        landingGearButton.classList.add('hidden');
        setMessage('Trains d\'atterrissage sortis !');
    });

    root.querySelectorAll('[data-appontage-collision]').forEach((button) => {
        button.addEventListener('click', () => adjustCollision(Number(button.dataset.appontageCollision), button.dataset.direction || ''));
    });

    engineButton.addEventListener('click', stopEngines);

    function startDescent() {
        if (state.descentTimer !== null || state.stopped) {
            return;
        }

        if (state.attitudePending && state.attitude === 0) {
            leftJoystick.classList.add('hidden');
            rightJoystick.classList.add('hidden');
            state.attitudePending = false;
        }

        play(sounds.stabilizers);
        state.descentTimer = window.setInterval(stepDescent, 60);
    }

    function stopDescent() {
        if (state.descentTimer === null) {
            return;
        }

        window.clearInterval(state.descentTimer);
        state.descentTimer = null;
        stop(sounds.stabilizers);
    }

    function stepDescent() {
        const distance = round(state.distance);

        if (distance === 9.2 && !state.propulsorsOff) {
            pauseForAction('Veuillez stopper les propulseurs avant de poursuivre.');
            propulsors.classList.remove('eventsoff');
            return;
        }

        if (distance === 7.6) {
            pauseForAction('Veillez à redresser l\'assiette avant de reprendre la manœuvre.');
            nudgeDistance();
            adjustAttitude(1, false);
            adjustAttitude(1, false);
            leftJoystick.classList.remove('hidden');
            rightJoystick.classList.remove('hidden');
            state.attitudePending = true;
            return;
        }

        if (distance === 7.5 && state.attitude !== 0) {
            pauseForAction('L\'assiette n\'est pas réglée correctement. Poursuite de la manœuvre impossible.');
            return;
        }

        if (distance === 5.1 && !state.gearOut) {
            pauseForAction('Nous sommes à mi-hauteur, veuillez sortir les trains d\'atterrissage.');
            nudgeDistance();
            play(sounds.beep);
            landingGearButton.classList.remove('hidden');
            return;
        }

        if (distance === 5 && !state.gearOut) {
            pauseForAction('Sortie des trains d\'atterrissage requise pour continuer la descente.');
            return;
        }

        if (distance === 4.4 && !collisionSolved(1)) {
            pauseForAction('Alerte collision ! Veuillez corriger le vecteur d\'approche pour continuer.');
            nudgeDistance();
            showCollisionStep(1);
            return;
        }

        if (distance === 4.3 && !collisionSolved(1)) {
            pauseForAction('Surface au sol irrégulière, risque de collision. Impossible de poursuivre.');
            return;
        }

        if (distance === 2.7 && !collisionSolved(2)) {
            pauseForAction('Alerte collision ! Veuillez corriger le vecteur d\'approche pour continuer.');
            nudgeDistance();
            collisionControls.classList.add('hidden');
            showCollisionStep(2);
            return;
        }

        if (distance === 2.6 && !collisionSolved(2)) {
            pauseForAction('Surface au sol irrégulière, risque de collision. Impossible de poursuivre.');
            return;
        }

        if (distance === 1.1) {
            pauseForAction('L\'assiette n\'est pas réglée correctement. Poursuite de la manœuvre impossible.<br><br>Il reste 1 mètre avant atterrissage.');
            nudgeDistance();
            adjustAttitude(-1, false);
            leftJoystick.classList.remove('hidden');
            rightJoystick.classList.remove('hidden');
            state.attitudePending = true;
            return;
        }

        if (distance === 1 && state.attitude !== 0) {
            pauseForAction('L\'assiette n\'est pas réglée correctement. Poursuite de la manœuvre impossible.<br><br>Il reste 1 mètre avant atterrissage.');
            return;
        }

        if (distance === 0.1) {
            pauseForAction('Parfait, nous sommes arrivés, vous pouvez couper les moteurs.');
            nudgeDistance();
            play(sounds.beep);
            engineButton.classList.remove('hidden');
            return;
        }

        if (distance === 0) {
            pauseForAction('Veuillez couper les moteurs du Seeker avant de sortir.');
            return;
        }

        descend();
    }

    function pauseForAction(text) {
        stopDescent();
        setMessage(text);
    }

    function descend() {
        state.hangarY -= 0.8;
        setDistance(state.distance - 0.1);
        updateHangar(70);

        if (state.distance < 2) {
            counter.classList.add('hidden');
            setMessage(`Il reste ${round(state.distance)} mètre avant atterrissage.`);
        }
    }

    function nudgeDistance() {
        setDistance(state.distance - 0.1);
    }

    function adjustAttitude(direction, playSound = true) {
        if (playSound) {
            play(sounds.stabs);
        }

        state.attitude += direction * 5;
        const stickAngle = direction > 0 ? 7 : -7;
        const buttonImage = direction > 0 ? document.getElementById('assiettedroite') : document.getElementById('assiettegauche');
        const buttonName = direction > 0 ? 'assiettedroite' : 'assiettegauche';

        stick.style.transform = `rotate(${stickAngle}deg)`;
        stick.style.transition = 'transform 500ms ease-in-out';
        buttonImage.src = imageBase + buttonName + 'click.png';
        window.setTimeout(() => {
            stick.style.transform = 'rotate(0deg)';
            stick.style.transition = 'transform 200ms ease-in-out';
            buttonImage.src = imageBase + buttonName + '.png';
        }, 300);

        attitudeImage.style.transform = `rotate(${state.attitude}deg)`;
        attitudeImage.style.transition = 'transform 700ms ease-in-out';
        updateHangar(700);

        if (state.attitude === 0) {
            attitudeImage.src = imageBase + 'assietteok.png';
            setMessage('Assiette à 0, reprise de la descente.');
        } else {
            attitudeImage.src = imageBase + 'assiettewrong.png';
            setMessage('L\'assiette n\'est pas réglée correctement. Poursuite de la manœuvre impossible.');
        }
    }

    function adjustCollision(index, direction) {
        play(sounds.stabs);

        const step = collisionSteps[index];
        if (!step) {
            return;
        }

        const target = step.vector;
        const marker = step.marker;
        const image = document.getElementById(direction + (index === 1 ? '' : '2'));

        image.src = imageBase + direction + 'click.png';
        window.setTimeout(() => {
            image.src = imageBase + direction + '.png';
        }, 120);

        if (direction === 'haut') {
            target.y += 10;
            state.scale += 0.05;
        } else if (direction === 'bas') {
            target.y -= 10;
            state.scale -= 0.05;
        } else if (direction === 'gauche') {
            target.x += 10;
            state.hangarX += 2;
        } else if (direction === 'droite') {
            target.x -= 10;
            state.hangarX -= 2;
        }

        marker.style.transform = `translate(${target.x}%, ${target.y}%)`;
        marker.style.transition = 'transform 700ms ease-in-out';
        updateHangar(700);

        const solved = collisionSolved(index);
        validCollisionMarker.classList.toggle('hidden', !solved);
        setMessage(solved ? step.solvedMessage : 'Alerte collision ! Veuillez corriger le vecteur d\'approche pour continuer.');

        if (solved) {
            step.controls.classList.add('eventsoff');
            step.marker.classList.add('hidden');
            collisionIndicator.classList.add('hidden');
        }
    }

    function showCollisionStep(index) {
        const step = collisionSteps[index];
        if (!step) {
            return;
        }

        step.controls.classList.remove('eventsoff', 'hidden');
        collisionIndicator.classList.remove('hidden');
        step.marker.classList.remove('hidden');
        validCollisionMarker.classList.add('hidden');
    }

    function stopEngines() {
        if (state.engineTimer !== null) {
            return;
        }

        state.stopped = true;
        stopDescent();
        stop(sounds.beep);
        play(sounds.engineStop);
        engineButton.classList.add('hidden');

        let remaining = 18;
        setMessage(`Arrêt des moteurs en cours, veuillez patienter jusqu'à leur extinction complète.<br><br>Arrêt des moteurs dans : ${remaining} secondes.`);
        state.engineTimer = window.setInterval(() => {
            remaining -= 1;
            setMessage(`Arrêt des moteurs en cours, veuillez patienter jusqu'à leur extinction complète.<br><br>Arrêt des moteurs dans : ${remaining} secondes.`);

            if (remaining <= 0) {
                window.clearInterval(state.engineTimer);
                state.engineTimer = null;
                completeForm?.submit();
            }
        }, 1000);
    }

    function collisionSolved(index) {
        const step = collisionSteps[index];
        return step ? step.vector.x === step.target.x && step.vector.y === step.target.y : false;
    }

    function updateHangar(duration) {
        hangar.style.transform = `rotate(${-state.attitude}deg) translate(${state.hangarX}%, ${state.hangarY}%) scale(${state.scale})`;
        hangar.style.transition = `transform ${duration}ms ease-in-out`;
    }

    function setDistance(value) {
        state.distance = Math.max(0, round(value));
        distanceValue.textContent = String(state.distance);
    }

    function setMessage(html) {
        message.innerHTML = html;
    }

    function round(value) {
        return Math.round(value * 10) / 10;
    }

    function audio(file, loop = false) {
        const item = new Audio(soundBase + file);
        item.loop = loop;
        return item;
    }

    function play(item) {
        item.currentTime = 0;
        item.play().catch(() => {});
    }

    function stop(item) {
        item.pause();
        item.currentTime = 0;
    }
})();
