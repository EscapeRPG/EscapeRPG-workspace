const accueilImg = document.getElementById("accueilLink"),
  aventuresImg = document.getElementById("aventuresLink"),
  reglesImg = document.getElementById("reglesLink"),
  liensImg = document.getElementById("liensLink");

class ImageHoverHandler {
  constructor(imageName) {
    this.imageName = imageName;
  }

  handleEvent(event) {
    if (event.type === "mouseover") {
      event.currentTarget.src = `/escaperpg/images/${this.imageName}hover.png`;
    } else {
      event.currentTarget.src = `/escaperpg/images/${this.imageName}.png`;
    }
  }
}

const accueilHandler = new ImageHoverHandler("logo_escaperpg");
const aventuresHandler = new ImageHoverHandler("aventures");
const reglesHandler = new ImageHoverHandler("regles");
const liensHandler = new ImageHoverHandler("liens");
const eventsHandlers = ["mouseover", "mouseout"];

eventsHandlers.forEach((eventName) => {
  accueilImg.addEventListener(eventName, accueilHandler);
  aventuresImg.addEventListener(eventName, aventuresHandler);
  reglesImg.addEventListener(eventName, reglesHandler);
  liensImg.addEventListener(eventName, liensHandler);
});

function chargement() {
  document.getElementById("load").style.display = "none";
  document.getElementById("loader").style.display = "none";
  document.getElementById("bloc_page").style.display = "block";
}