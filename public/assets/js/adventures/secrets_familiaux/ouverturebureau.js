document.addEventListener("DOMContentLoaded", () => {
  const normalize = (value) =>
    String(value || "")
      .normalize("NFD")
      .replace(/[\u0300-\u036f]/g, "")
      .toLowerCase()
      .replace(/[^a-z0-9]/g, "");

  document.querySelectorAll('form button[name="action"][value="ouvrir"]').forEach((button) => {
    const form = button.closest("form");
    const input = form ? form.querySelector('input[name="phr"]') : null;

    if (!form || !input) {
      return;
    }

    form.addEventListener("submit", async (event) => {
      if (button.dataset.modalHandled === "true") {
        return;
      }

      if (normalize(input.value) !== "leclaireouvrelechemin") {
        return;
      }

      event.preventDefault();
      button.dataset.modalHandled = "true";

      const audio = new Audio("/assets/sounds/secrets/bureauouvert.mp3");
      audio.play().catch(() => {});

      if (globalThis.EscapeRPGModal) {
        await globalThis.EscapeRPGModal.alert(
          "Alors que vous prononcez les mots, vous sentez l'air autour de vous devenir un peu plus dense. Vous entendez un petit bruit, comme un claquement, et la porte s'ouvre."
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
});
