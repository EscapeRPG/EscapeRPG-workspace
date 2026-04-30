document.addEventListener("DOMContentLoaded", () => {
  const imageLinks = document.querySelectorAll(
    'a[rel^="lightbox"], a[href$=".png"], a[href$=".jpg"], a[href$=".jpeg"], a[href$=".gif"], a[href$=".webp"]'
  );

  if (imageLinks.length === 0) {
    return;
  }

  const modal = document.createElement("div");
  modal.className = "image-modal";
  modal.innerHTML = `
    <div class="image-modal__dialog" role="dialog" aria-modal="true" aria-label="Image agrandie">
      <button type="button" class="image-modal__close" aria-label="Fermer">&times;</button>
      <img class="image-modal__image" src="" alt="">
      <p class="image-modal__caption"></p>
    </div>
  `;
  document.body.appendChild(modal);

  const dialog = modal.querySelector(".image-modal__dialog");
  const image = modal.querySelector(".image-modal__image");
  const caption = modal.querySelector(".image-modal__caption");
  const closeButton = modal.querySelector(".image-modal__close");

  const closeModal = () => {
    modal.classList.remove("is-open");
    setTimeout(() => {
    image.src = "";
    image.alt = "";
    caption.textContent = "";
    }, 500);
  };

  imageLinks.forEach((link) => {
    link.addEventListener("click", (event) => {
      const href = link.getAttribute("href");
      if (!href) {
        return;
      }

      const linkedImage = link.querySelector("img");
      const alt =
        linkedImage?.getAttribute("alt") ||
        linkedImage?.getAttribute("title") ||
        link.getAttribute("title") ||
        "";

      event.preventDefault();
      image.src = href;
      image.alt = alt;
      caption.textContent = alt;
      modal.classList.add("is-open");
      closeButton.focus();
    });
  });

  closeButton.addEventListener("click", closeModal);

  modal.addEventListener("click", (event) => {
    if (!dialog.contains(event.target)) {
      closeModal();
    }
  });

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && modal.classList.contains("is-open")) {
      closeModal();
    }
  });
});
