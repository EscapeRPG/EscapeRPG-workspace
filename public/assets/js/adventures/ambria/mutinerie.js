(() => {
  const root = document.querySelector("[data-mutinerie-game]");
  if (!root) {
    return;
  }

  const level = {
    map: [
      [0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 0, 0, 1, 2],
      [0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1],
      [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0],
      [0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1],
      [0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 0, 0, 1, 2],
    ],
    player: { x: 1, y: 0 },
    goal: { x: 13, y: 2 },
    tresor: { x: 20, y: 4 },
    garde1: { x: 16, y: 3 },
    garde2: { x: 10, y: 0 },
  };

  const tileTypes = ["floor", "wall", "sea"];
  const tileDim = 40;
  const map = root.querySelector(".game-map");
  const tiles = root.querySelector("#tiles");
  const sprites = root.querySelector("#sprites");
  const form = root.querySelector("[data-mutinerie-form]");
  const actionInput = form.querySelector("input[name='action']");
  const tresorImage = root.querySelector("#tresorimg");
  const cracks = {
    "12,1": root.querySelector("#crack1"),
    "19,4": root.querySelector("#crack2"),
    "21,2": root.querySelector("#crack3"),
  };

  const player = { ...level.player, el: null };
  const crackedTiles = new Set();
  let hasTreasure = false;
  let locked = false;

  const sounds = {
    crack: new Audio("/assets/sounds/ambria/crackplancher.mp3"),
    garde: new Audio("/assets/sounds/ambria/garde.mp3"),
    tresor: new Audio("/assets/sounds/ambria/taketresor.mp3"),
    dormeur: new Audio("/assets/sounds/ambria/dormeur.mp3"),
  };

  const instantCracks = new Set(["0,3", "7,3", "8,1", "9,2", "12,3", "18,1", "19,3", "20,0", "20,2"]);
  const barthyWake = new Set(["2,0", "1,1", "2,1", "3,1", "2,2"]);
  const lloydWake = new Set(["4,1", "4,3", "1,4", "3,4"]);
  const guardSight = new Set(["9,1", "10,1", "10,0", "11,1", "10,2", "14,3", "15,2", "15,3", "16,3"]);
  const warningCracks = new Set(Object.keys(cracks));

  const createTile = (x, y, type) => {
    const element = document.createElement("div");
    element.className = type;
    element.style.width = `${tileDim}px`;
    element.style.height = `${tileDim}px`;
    element.style.left = `${x * tileDim}px`;
    element.style.top = `${y * tileDim}px`;
    return element;
  };

  const placeSprite = (position, type) => {
    const sprite = createTile(position.x, position.y, type);
    sprites.appendChild(sprite);
    return sprite;
  };

  const render = () => {
    root.classList.add("default");
    map.style.width = `${level.map[0].length * tileDim}px`;
    map.style.height = `${level.map.length * tileDim}px`;

    level.map.forEach((row, y) => {
      row.forEach((tileCode, x) => {
        tiles.appendChild(createTile(x, y, tileTypes[tileCode] || "floor"));
      });
    });

    placeSprite(level.goal, "goal");
    placeSprite(level.tresor, "tresor");
    placeSprite(level.garde1, "garde1");
    placeSprite(level.garde2, "garde2");
    player.el = placeSprite(player, "player");
  };

  const modal = async (message) => {
    if (window.EscapeRPGModal && typeof window.EscapeRPGModal.alert === "function") {
      await window.EscapeRPGModal.alert(message);
    }
  };

  const submitOutcome = async (action, message, sound = null) => {
    if (locked) {
      return;
    }

    locked = true;
    if (sound !== null) {
      sound.play();
    }
    await modal(message);
    actionInput.value = action;
    form.submit();
  };

  const updatePlayer = () => {
    player.el.style.left = `${player.x * tileDim}px`;
    player.el.style.top = `${player.y * tileDim}px`;
  };

  const canMove = (x, y) => {
    if (y < 0 || y >= level.map.length || x < 0 || x >= level.map[y].length) {
      return false;
    }

    return level.map[y][x] === 0;
  };

  const checkGoal = async () => {
    const key = `${player.x},${player.y}`;

    if (player.x === level.goal.x && player.y === level.goal.y) {
      if (!hasTreasure) {
        await modal("Vous ne pouvez pas partir avant d'avoir récupéré votre part du butin.");
        return;
      }

      await submitOutcome("mutiny_success", "Prenant garde à chacun de vos pas, vous grimpez les marches menant au pont supérieur.");
      return;
    }

    if (player.x === level.tresor.x && player.y === level.tresor.y && !hasTreasure) {
      sounds.tresor.play();
      await modal("Vous prenez le trésor avec vous. Plus qu'à sortir d'ici.");
      tresorImage.classList.add("hide");
      hasTreasure = true;
      return;
    }

    if (instantCracks.has(key)) {
      await submitOutcome("mutiny_fail_noise", "Vous marchez sur une latte qui grince sous votre poids.", sounds.crack);
      return;
    }

    if (barthyWake.has(key)) {
      await submitOutcome("mutiny_fail_barthy", "Vous passez trop près de Barthy, en train de dormir. Il se réveille aussitôt.", sounds.dormeur);
      return;
    }

    if (lloydWake.has(key)) {
      await submitOutcome("mutiny_fail_lloyd", "Vous tentez de ramper sous le hamac, mais vous réveillez Lloyd qui y dormait.", sounds.dormeur);
      return;
    }

    if (guardSight.has(key)) {
      await submitOutcome("mutiny_fail_guard", "Le garde qui surveillait le pont inférieur vous remarque et se place devant vous.", sounds.garde);
      return;
    }

    if (!warningCracks.has(key)) {
      return;
    }

    if (!crackedTiles.has(key)) {
      sounds.crack.play();
      await modal("En passant, vous sentez la planche craquer très légèrement. Si vous repassez dessus, vous serez à coup sûr repéré.");
      cracks[key].classList.add("cracking");
      crackedTiles.add(key);
      return;
    }

    await submitOutcome("mutiny_fail_noise", "Vous marchez sur une latte qui grince sous votre poids.", sounds.crack);
  };

  const move = (dx, dy) => {
    if (locked) {
      return;
    }

    const nextX = player.x + dx;
    const nextY = player.y + dy;
    if (!canMove(nextX, nextY)) {
      return;
    }

    player.x = nextX;
    player.y = nextY;
    updatePlayer();
    void checkGoal();
  };

  document.addEventListener("keydown", (event) => {
    const keys = {
      ArrowLeft: [-1, 0],
      ArrowUp: [0, -1],
      ArrowRight: [1, 0],
      ArrowDown: [0, 1],
    };
    const direction = keys[event.key];
    if (!direction) {
      return;
    }

    event.preventDefault();
    move(direction[0], direction[1]);
  });

  root.querySelector("#up").addEventListener("click", () => move(0, -1));
  root.querySelector("#down").addEventListener("click", () => move(0, 1));
  root.querySelector("#left").addEventListener("click", () => move(-1, 0));
  root.querySelector("#right").addEventListener("click", () => move(1, 0));

  render();
})();
