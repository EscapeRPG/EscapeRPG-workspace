const toasts = document.querySelectorAll(".app-toast");

toasts.forEach((toast, index) => {
  window.setTimeout(() => {
    toast.classList.add("is-visible");
  }, 150 + index * 250);

  window.setTimeout(() => {
    toast.classList.remove("is-visible");
    toast.classList.add("is-leaving");
  }, 5200 + index * 250);

  window.setTimeout(() => {
    toast.remove();
  }, 6000 + index * 250);
});
