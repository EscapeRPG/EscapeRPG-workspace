document.getElementById("levier").addEventListener("click", rangecheck);

function submitAction(action) {
  const form = document.createElement("form");
  const input = document.createElement("input");

  form.method = "post";
  form.action = window.location.pathname;
  input.type = "hidden";
  input.name = "action";
  input.value = action;

  form.appendChild(input);
  document.body.appendChild(form);
  form.submit();
}

async function showMessage(message) {
  if (window.EscapeRPGModal) {
    await window.EscapeRPGModal.alert(message);
    return;
  }

  window.alert(message);
}

async function rangecheck() {
  const range = document.getElementById("range").value;

  if (range === "4") {
    await showMessage("La machine commence à émettre un doux ronronnement.");
    submitAction("calibrate_done");
  } else {
    await showMessage("Rien ne se passe.");
  }
}
