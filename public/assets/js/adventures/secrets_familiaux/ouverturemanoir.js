document.addEventListener("DOMContentLoaded", () => {
  const button = document.querySelector("[data-open-manor]");

  if (!button) {
    return;
  }

  button.addEventListener("click", async (event) => {
    const form = button.closest("form");

    if (!form || button.dataset.modalHandled === "true") {
      return;
    }

    event.preventDefault();
    button.dataset.modalHandled = "true";

    const audio = new Audio("/assets/sounds/secrets/ouverturemanoir.mp3");
    audio.play().catch(() => {});

    if (globalThis.EscapeRPGModal) {
      await globalThis.EscapeRPGModal.alert(
        "La clé entre parfaitement dans la serrure. Vous ouvrez la porte et entrez dans le manoir."
      );
    }

    const action = document.createElement("input");
    action.type = "hidden";
    action.name = button.name;
    action.value = button.value;
    form.appendChild(action);
    form.submit();
  });
});
