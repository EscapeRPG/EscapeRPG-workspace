(() => {
  const roomCodes = "abcdefghijklmnopqrst".split("");
  const rooms = Object.fromEntries(
    roomCodes.map((code) => [code, document.getElementById(`${code}salletop`)])
  );
  const timer = document.getElementById("timer");

  if (!timer || Object.values(rooms).some((room) => !room)) {
    return;
  }

  const toggleMap = {
    a: ["a", "b", "f"],
    b: ["a", "b", "c", "g"],
    c: ["b", "c", "g", "d"],
    d: ["c", "d", "h", "e"],
    e: ["d", "i", "e"],
    f: ["f", "a", "g", "j", "k"],
    g: ["g", "b", "c", "f", "l", "h"],
    h: ["h", "d", "g", "i", "l", "m", "o", "s"],
    i: ["i", "e", "h", "m"],
    j: ["j", "f", "k", "n"],
    k: ["k", "j", "f", "l", "n"],
    l: ["l", "k", "g", "h", "o"],
    m: ["m", "i", "h", "p"],
    n: ["n", "j", "k", "o", "q"],
    o: ["o", "l", "n", "h", "r"],
    p: ["p", "m", "s", "t"],
    q: ["q", "n", "r"],
    r: ["r", "q", "o", "s"],
    s: ["s", "t", "r", "h", "p"],
    t: ["t", "s", "p"],
  };

  let solved = false;
  const deadline = Date.now() + 2 * 60 * 1000;
  const interval = window.setInterval(updateTimer, 100);

  document.querySelectorAll("[data-room-toggle]").forEach((button) => {
    button.addEventListener("click", () => toggleRoom(button.dataset.roomToggle));
  });

  updateTimer();

  function toggleRoom(code) {
    if (solved || !toggleMap[code]) {
      return;
    }

    toggleMap[code].forEach((roomCode) => {
      rooms[roomCode].classList.toggle("hidden");
    });

    checkSolution();
  }

  function updateTimer() {
    if (solved) {
      return;
    }

    const remaining = deadline - Date.now();

    if (remaining <= 0) {
      window.clearInterval(interval);
      timer.textContent = "00 : 00 : 0";
      showModal("Game over man !");
      return;
    }

    const minutes = Math.floor((remaining % (1000 * 60 * 60)) / (1000 * 60))
      .toString()
      .padStart(2, "0");
    const seconds = Math.floor((remaining % (1000 * 60)) / 1000)
      .toString()
      .padStart(2, "0");
    const tenths = Math.floor((remaining % 1000) / 100);

    timer.textContent = `${minutes} : ${seconds} : ${tenths}`;
  }

  function checkSolution() {
    const pathClear =
      isHidden("i") &&
      isHidden("e") &&
      isHidden("h") &&
      isHidden("q") &&
      isHidden("r") &&
      (isHidden("o") || isHidden("s"));
    const hazardContained =
      isVisible("d") &&
      isVisible("g") &&
      isVisible("l") &&
      isVisible("m") &&
      isVisible("n");

    if (!pathClear || !hazardContained) {
      return;
    }

    solved = true;
    window.clearInterval(interval);
    showModal("T'as réussi !");
  }

  function isHidden(code) {
    return rooms[code].classList.contains("hidden");
  }

  function isVisible(code) {
    return !isHidden(code);
  }

  function showModal(message) {
    if (window.EscapeRPGModal) {
      window.EscapeRPGModal.alert(message);
      return;
    }

    window.alert(message);
  }
})();
