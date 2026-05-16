const hazardMessages = {
  rope: "En passant ici, vous sentez l'un des cordages céder, manquant vous faire tomber.",
  moss: "En essayant d'attraper le cordage, vous glissez sur un amas de mousse qui s'est accumulé.",
  mossLimestone: "Vous essayez de grimper les haubans mais, en passant ici, vous glissez un peu sur de la mousse et tentez de vous rattraper. Vous agrippez les cordages mais des petits amas de calcaire s'effritent sous vos doigts et vous vous rattrapez en catastrophe.",
  limestone: "Vous saisissez le cordage mais de petits amas de calcaire s'effritent sous vos doigts et vous vous rattrapez de justesse.",
};

const hazardCells = {
  "0,5": "rope",
  "3,4": "rope",
  "1,3": "rope",
  "3,0": "rope",
  "1,5": "moss",
  "0,0": "moss",
  "4,0": "moss",
  "1,1": "mossLimestone",
  "2,3": "mossLimestone",
  "4,5": "mossLimestone",
  "4,2": "limestone",
};

class HaubansGame {
  constructor(id) {
    this.el = document.getElementById(id);
    this.tileDim = 120;
    this.width = 5;
    this.height = 7;
    this.player = { x: 0, y: 6, el: null };
    this.goal = { x: 2, y: 0 };
    this.failed = false;
    this.locked = false;
    this.submitted = false;
  }

  init() {
    if (!this.el) {
      return;
    }

    this.el.className = "game-container haubans";
    this.populateMap();
    this.sizeMap();
    this.placeSprite("goalhaubans", this.goal);
    this.player.el = this.placeSprite("loganhaubans", this.player);
    this.bindControls();
  }

  populateMap() {
    const tiles = this.el.querySelector("#tileshaubans");
    if (!tiles) {
      return;
    }

    tiles.innerHTML = "";
    for (let y = 0; y < this.height; y += 1) {
      for (let x = 0; x < this.width; x += 1) {
        tiles.appendChild(this.createTile(x, y, "cordage"));
      }
    }
  }

  createTile(x, y, className) {
    const el = document.createElement("div");
    el.className = className;
    el.style.width = `${this.tileDim}px`;
    el.style.height = `${this.tileDim}px`;
    el.style.left = `${x * this.tileDim}px`;
    el.style.top = `${y * this.tileDim}px`;

    return el;
  }

  placeSprite(className, position) {
    const sprite = this.createTile(position.x, position.y, className);
    sprite.id = className;
    sprite.style.borderRadius = `${this.tileDim}px`;
    this.el.querySelector("#sprites")?.appendChild(sprite);

    return sprite;
  }

  sizeMap() {
    const map = this.el.querySelector(".map-haubans");
    if (!map) {
      return;
    }

    map.style.width = `${this.width * this.tileDim}px`;
    map.style.height = `${this.height * this.tileDim}px`;
  }

  bindControls() {
    document.addEventListener("keydown", (event) => {
      if (!["ArrowLeft", "ArrowUp", "ArrowRight", "ArrowDown"].includes(event.key)) {
        return;
      }

      event.preventDefault();
      this.moveByKey(event.key);
    });

    this.el.querySelector("#up")?.addEventListener("click", () => this.move(0, -1));
    this.el.querySelector("#down")?.addEventListener("click", () => this.move(0, 1));
    this.el.querySelector("#left")?.addEventListener("click", () => this.move(-1, 0));
    this.el.querySelector("#right")?.addEventListener("click", () => this.move(1, 0));
  }

  moveByKey(key) {
    const moves = {
      ArrowLeft: [-1, 0],
      ArrowUp: [0, -1],
      ArrowRight: [1, 0],
      ArrowDown: [0, 1],
    };
    const [x, y] = moves[key];
    this.move(x, y);
  }

  move(deltaX, deltaY, checkPosition = true) {
    if (this.locked || this.submitted) {
      return;
    }

    const nextX = this.player.x + deltaX;
    const nextY = this.player.y + deltaY;
    if (nextX < 0 || nextX >= this.width || nextY < 0 || nextY >= this.height) {
      return;
    }

    this.player.x = nextX;
    this.player.y = nextY;
    this.updatePlayer();
    if (checkPosition) {
      this.checkPosition();
    }
  }

  updatePlayer() {
    if (!this.player.el) {
      return;
    }

    this.player.el.style.left = `${this.player.x * this.tileDim}px`;
    this.player.el.style.top = `${this.player.y * this.tileDim}px`;
  }

  async checkPosition() {
    if (this.player.x === this.goal.x && this.player.y === this.goal.y) {
      this.submitted = true;
      await window.EscapeRPGDragDropPuzzle?.submitAction(this.failed ? "haubans_failure" : "haubans_success");
      return;
    }

    const hazard = hazardCells[`${this.player.x},${this.player.y}`];
    if (!hazard) {
      return;
    }

    this.failed = true;
    this.move(0, 1, false);
    if (window.EscapeRPGModal) {
      this.locked = true;
      await window.EscapeRPGModal.alert(hazardMessages[hazard]);
      this.locked = false;
    }
  }
}

new HaubansGame("game-container-1").init();
