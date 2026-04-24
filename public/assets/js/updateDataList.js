function updateDataList() {
  const notesListe = document.getElementById("notesListe");

  fetch("/escaperpg/includes/get_items.php")
    .then((response) => response.json())
    .then((items) => {
      notesListe.innerHTML = "";

      items.forEach((item) => {
        const option = document.createElement("option");
        option.value = item;
        notesListe.appendChild(option);
      });
    });
}
updateDataList();
