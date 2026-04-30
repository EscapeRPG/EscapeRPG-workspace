const toasts = document.querySelectorAll(".app-toast");

toasts.forEach((toast, index) => {
  window.setTimeout(() => {
    toast.classList.add("is-visible");
  }, 150 + index * 250);

  window.setTimeout(() => {
    toast.classList.add("is-leaving");
  }, 5200 + index * 1500);

  window.setTimeout(() => {
    toast.remove();
  }, 5450 + index * 1500);
});
