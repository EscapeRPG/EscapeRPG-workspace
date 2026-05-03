window.EscapeRPGDragDropPuzzle = (() => {
  const find = (selector, root = document) => Array.from(root.querySelectorAll(selector));

  const defaultDragId = (element) => element.id || element.dataset.piece || "";

  const submitAction = (action, formAction = window.location.pathname) => {
    const form = document.createElement("form");
    const input = document.createElement("input");

    form.method = "post";
    form.action = formAction;
    input.type = "hidden";
    input.name = "action";
    input.value = action;

    form.appendChild(input);
    document.body.appendChild(form);
    form.submit();
  };

  const complete = async (options = {}) => {
    if (options.audio) {
      new Audio(options.audio).play().catch(() => {});
    }

    if (options.modal && window.EscapeRPGModal) {
      await window.EscapeRPGModal.alert(options.modal);
    }

    if (typeof options.callback === "function") {
      options.callback();
      return;
    }

    if (options.redirect) {
      window.location.href = options.redirect;
      return;
    }

    if (options.submitAction) {
      submitAction(options.submitAction, options.formAction);
    }
  };

  const init = (config) => {
    const root = document.querySelector(config.root || ".adventure-shell");

    if (!root) {
      return null;
    }

    if (typeof config.build === "function") {
      config.build(root);
    }

    const dragSelector = config.draggables;
    const dropSelector = config.drops;
    const homeSelector = config.homes || config.draggablesContainer;
    const homeContainer = config.homeContainer ? root.querySelector(config.homeContainer) : null;
    const homeSlotClass = config.homeSlotClass || "";
    const homeSlotSelector = homeSlotClass ? `.${homeSlotClass}` : homeSelector;

    if (!dragSelector || !dropSelector) {
      return null;
    }

    let draggedElement = null;
    let solved = false;
    const getDragId = config.getDragId || defaultDragId;
    const getPlacedId = config.getPlacedId || ((drop) => {
      const placed = drop.querySelector(dragSelector);
      return placed ? getDragId(placed) : "";
    });
    const matches = config.matches || {};
    const knownDragIds = new Set(find(dragSelector, root).map((element) => getDragId(element)).filter(Boolean));

    const applyDragEvents = (element) => {
      if (element.dataset.dragDropReady === "true") {
        return;
      }

      element.dataset.dragDropReady = "true";
      element.draggable = true;
      element.addEventListener("dragstart", (event) => {
        draggedElement = element;
        event.dataTransfer.setData("text/plain", getDragId(element));
      });
    };

    const checkSolved = () => {
      if (solved || !Object.entries(matches).every(([dropId, expected]) => {
        const drop = document.getElementById(dropId);
        return drop && getPlacedId(drop) === expected;
      })) {
        return;
      }

      solved = true;
      complete(config.onSolved);
    };

    const createHomeSlot = () => {
      if (!homeContainer || !homeSlotClass) {
        return null;
      }

      const slot = document.createElement("div");
      slot.className = homeSlotClass;
      homeContainer.appendChild(slot);
      applyDropEvents(slot);

      return slot;
    };

    const removeEmptyHomeSlots = () => {
      if (!homeContainer || !homeSlotSelector) {
        return;
      }

      find(homeSlotSelector, homeContainer).forEach((slot) => {
        if (!slot.querySelector(dragSelector)) {
          slot.remove();
        }
      });
    };

    const ensureEmptyHomeSlot = () => {
      if (!homeContainer || !homeSlotSelector || knownDragIds.size === 0) {
        return;
      }

      const homeSlots = find(homeSlotSelector, homeContainer);
      const homePieceCount = homeSlots.filter((slot) => slot.querySelector(dragSelector)).length;
      const hasEmptySlot = homeSlots.some((slot) => !slot.querySelector(dragSelector));

      if (homePieceCount < knownDragIds.size && !hasEmptySlot) {
        createHomeSlot();
      }
    };

    const refreshHomeSlots = () => {
      removeEmptyHomeSlots();
      ensureEmptyHomeSlot();
    };

    const emptyHomeSlot = () => {
      if (!homeContainer || !homeSlotSelector) {
        return null;
      }

      return find(homeSlotSelector, homeContainer).find((slot) => !slot.querySelector(dragSelector))
        || createHomeSlot();
    };

    const moveExistingTargetItemToHome = (target) => {
      const existing = target.querySelector(dragSelector);

      if (!existing || existing === draggedElement) {
        return;
      }

      const slot = emptyHomeSlot();
      if (!slot) {
        existing.remove();
        return;
      }

      slot.innerHTML = "";
      slot.appendChild(existing);
      applyDragEvents(existing);
    };

    const placeDraggedElement = (target) => {
      if (!draggedElement) {
        return;
      }

      if (config.singleOccupancy !== false && target.matches(dropSelector) && target.querySelector(dragSelector)) {
        target.classList.add(config.rejectedClass || "shake");
        window.setTimeout(() => target.classList.remove(config.rejectedClass || "shake"), 300);
        return;
      }

      const mode = config.mode || "clone";
      if (mode === "clone") {
        const clone = draggedElement.cloneNode(true);
        delete clone.dataset.dragDropReady;

        moveExistingTargetItemToHome(target);
        draggedElement.remove();
        if (target.matches(dropSelector) || (homeSlotSelector && target.matches(homeSlotSelector))) {
          target.innerHTML = "";
        }
        target.appendChild(clone);
        applyDragEvents(clone);
      } else {
        target.appendChild(draggedElement);
      }

      refreshHomeSlots();
      checkSolved();
    };

    const applyDropEvents = (target) => {
      target.addEventListener("dragover", (event) => {
        event.preventDefault();
        target.classList.add(config.hoverClass || "drop_hover");
      });

      target.addEventListener("dragleave", () => {
        target.classList.remove(config.hoverClass || "drop_hover");
      });

      target.addEventListener("drop", (event) => {
        event.preventDefault();
        target.classList.remove(config.hoverClass || "drop_hover");
        placeDraggedElement(target);
      });
    };

    find(dragSelector, root).forEach(applyDragEvents);
    find(dropSelector, root).forEach(applyDropEvents);

    if (homeSlotSelector) {
      find(homeSlotSelector, root).forEach(applyDropEvents);
    }

    refreshHomeSlots();

    return { checkSolved };
  };

  return { init, submitAction };
})();
