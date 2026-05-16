(() => {
  const root = document.querySelector("[data-golem-sequence]");
  if (!root) {
    return;
  }

  const expected = ["6", "2", "11", "4", "11", "7", "1", "9"];
  const chosen = [];
  const panel = root.querySelector("[data-golem-panel]");
  const form = root.querySelector("[data-golem-form]");
  const result = root.querySelector("[data-golem-result]");
  const reset = root.querySelector("[data-golem-reset]");

  const gemClasses = {
    1: "rondbleu",
    2: "carrebleu",
    3: "trianglebleu",
    4: "rondrouge",
    5: "carrerouge",
    6: "trianglerouge",
    7: "rondvert",
    8: "carrevert",
    9: "trianglevert",
    10: "rondjaune",
    11: "carrejaune",
    12: "trianglejaune",
  };

  const buttonLabel = (value) => {
    const button = root.querySelector(`[data-golem-value="${value}"]`);
    return button ? button.getAttribute("aria-label") || "" : "";
  };

  const renderPanel = () => {
    panel.innerHTML = "";

    if (chosen.length === 0) {
      const empty = document.createElement("span");
      empty.className = "golem-sequence__empty";
      empty.textContent = ".";
      panel.appendChild(empty);
      return;
    }

    chosen.forEach((value) => {
      const item = document.createElement("span");
      item.className = `golem-sequence__choice ${gemClasses[value] || ""}`;
      item.setAttribute("aria-label", buttonLabel(value));
      panel.appendChild(item);
    });
  };

  root.querySelectorAll("[data-golem-value]").forEach((button) => {
    button.addEventListener("click", () => {
      chosen.push(button.dataset.golemValue || "");
      renderPanel();
    });
  });

  reset.addEventListener("click", () => {
    chosen.length = 0;
    renderPanel();
  });

  form.addEventListener("submit", async (event) => {
    event.preventDefault();

    const success = chosen.length === expected.length
      && chosen.every((value, index) => value === expected[index]);

    result.value = success ? "success" : "failure";

    if (window.EscapeRPGModal && typeof window.EscapeRPGModal.alert === "function") {
      await window.EscapeRPGModal.alert(
        success
          ? "Vous grimpez aussi vite que vous le pouvez."
          : "Vous grimpez, mais l'ascension se révèle plus compliquée que prévue."
      );
    }

    form.submit();
  });

  renderPanel();
})();
