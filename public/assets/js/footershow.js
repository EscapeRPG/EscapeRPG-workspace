const footerTriggers = document.querySelectorAll("[data-footer-trigger]");
const footerPanels = document.querySelectorAll("[data-footer-panel]");

footerTriggers.forEach((trigger) => {
  trigger.addEventListener("click", () => {
    toggleFooterPanel(trigger);
  });
});

function toggleFooterPanel(activeTrigger) {
  const target = activeTrigger.dataset.footerTrigger;
  const activePanel = document.querySelector(`[data-footer-panel="${target}"]`);
  if (!activePanel) {
    return;
  }

  const shouldOpen = !activePanel.classList.contains("is-open");

  footerTriggers.forEach((trigger) => trigger.classList.remove("current"));
  footerPanels.forEach((panel) => panel.classList.remove("is-open"));

  if (shouldOpen) {
    activeTrigger.classList.add("current");
    activePanel.classList.add("is-open");
  }
}
