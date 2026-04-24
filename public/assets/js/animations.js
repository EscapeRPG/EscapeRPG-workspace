const enterSite = document.getElementById("enterSite");

class ImageHoverHandler {
  constructor(imageName) {
    this.imageName = imageName;
  }

  handleEvent(event) {
    if (event.type === "mouseover") {
      event.currentTarget.src = `/assets/img/${this.imageName}hover.png`;
    } else {
      event.currentTarget.src = `/assets/img/${this.imageName}.png`;
    }
  }
}

const enterSiteHandler = new ImageHoverHandler("next");
const eventsHandlers = ["mouseover", "mouseout"];

eventsHandlers.forEach((eventName) => {
  enterSite.addEventListener(eventName, enterSiteHandler);
});
