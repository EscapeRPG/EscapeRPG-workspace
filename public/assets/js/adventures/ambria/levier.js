(() => {
  const root = document.querySelector("[data-levier-game]");
  if (!root) {
    return;
  }

  const level = {
    map: [
      [2, 1, 0, 0, 0, 0, 1, 0, 2],
      [0, 0, 1, 0, 1, 0, 0, 0, 0],
      [2, 0, 1, 0, 0, 1, 1, 0, 2],
      [0, 0, 0, 0, 1, 0, 1, 0, 0],
      [2, 1, 0, 1, 0, 0, 0, 1, 2],
      [0, 0, 0, 0, 0, 1, 0, 0, 0],
      [2, 2, 2, 2, 0, 2, 2, 2, 2],
    ],
    player: { x: 4, y: 6 },
    goal: { x: 8, y: 3 },
  };

  const tileTypes = ["floor", "wall", "rien"];
  const tileDim = 60;
  const tiles = root.querySelector("#tiles");
  const sprites = root.querySelector("#sprites");
  const form = root.querySelector("[data-levier-form]");
  const map = root.querySelector(".map-levier");
  const player = { ...level.player, el: null };

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
    root.classList.add("levier");
    map.style.width = `${level.map[0].length * tileDim}px`;
    map.style.height = `${level.map.length * tileDim}px`;

    level.map.forEach((row, y) => {
      row.forEach((tileCode, x) => {
        tiles.appendChild(createTile(x, y, tileTypes[tileCode] || "floor"));
      });
    });

    placeSprite(level.goal, "goallevier");
    player.el = placeSprite(player, "playerlevier");
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
    if (player.x !== level.goal.x || player.y !== level.goal.y) {
      return;
    }

    if (window.EscapeRPGModal && typeof window.EscapeRPGModal.alert === "function") {
      await window.EscapeRPGModal.alert("En passant le levier, quelque chose semble s'enclencher.");
    }

    form.submit();
  };

  const move = (dx, dy) => {
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
