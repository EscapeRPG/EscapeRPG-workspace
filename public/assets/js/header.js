document.addEventListener("DOMContentLoaded", () => {
  const logo = document.querySelector("#accueilLink");

  if (!logo) {
    return;
  }

  const defaultSrc = logo.dataset.defaultSrc;
  const hoverSrc = logo.dataset.hoverSrc;

  if (!defaultSrc || !hoverSrc) {
    return;
  }

  const setDefault = () => {
    logo.src = defaultSrc;
  };

  const setHover = () => {
    logo.src = hoverSrc;
  };

  logo.addEventListener("mouseenter", setHover);
  logo.addEventListener("mouseleave", setDefault);
  logo.addEventListener("focus", setHover);
  logo.addEventListener("blur", setDefault);
});
