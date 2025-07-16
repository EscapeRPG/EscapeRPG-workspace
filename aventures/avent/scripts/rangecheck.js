function rangecheck() {
  let range = document.getElementById("range").value;

  if (range == 4) {
    alert("La machine commence à émettre un doux ronronnement.");
    document.location.href = "repairs.php";
  } else {
    alert("Rien ne se passe.");
  }
}
