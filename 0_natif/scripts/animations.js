const accueilImg = document.getElementById("accueilLink"),
  aventuresImg = document.getElementById("aventuresLink"),
  reglesImg = document.getElementById("reglesLink"),
  liensImg = document.getElementById("liensLink"),
  enterSite = document.getElementById("enterSite");

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

const accueilHandler = new ImageHoverHandler("home");
const aventuresHandler = new ImageHoverHandler("aventuresnav");
const reglesHandler = new ImageHoverHandler("reglesnav");
const liensHandler = new ImageHoverHandler("liensnav");
const enterSiteHandler = new ImageHoverHandler("next");
const eventsHandlers = ["mouseover", "mouseout"];

eventsHandlers.forEach((eventName) => {
  accueilImg.addEventListener(eventName, accueilHandler);
  aventuresImg.addEventListener(eventName, aventuresHandler);
  reglesImg.addEventListener(eventName, reglesHandler);
  liensImg.addEventListener(eventName, liensHandler);
  enterSite.addEventListener(eventName, enterSiteHandler);
});
