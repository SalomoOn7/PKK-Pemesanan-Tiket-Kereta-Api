// Popper Dropdown (Search, etc)
const popperInstance = {};

document.querySelectorAll(".dropdown").forEach((item, index) => {
  const popperId = "popper-" + index;
  const toggle = item.querySelector(".dropdown-toggle");
  const menu = item.querySelector(".dropdown-menu");

  if (!toggle || !menu) return;

  menu.dataset.popperId = popperId;
  popperInstance[popperId] = Popper.createPopper(toggle, menu, {
    placement: "bottom-end",
    modifiers: [
      { name: "offset", options: { offset: [0, 8] } },
      { name: "preventOverflow", options: { boundary: document.body } },
    ],
  });

  toggle.addEventListener("click", function (e) {
    e.stopPropagation();

    hideDropdown(); // Sembunyikan dropdown lain

    if (menu.classList.contains("hidden")) {
      menu.classList.remove("hidden");
      showPopper(popperId);
    } else {
      menu.classList.add("hidden");
      hidePopper(popperId);
    }
  });
});

document.addEventListener("click", function (e) {
  if (!e.target.closest(".dropdown")) {
    hideDropdown();
  }
});

function hideDropdown() {
  document.querySelectorAll(".dropdown-menu").forEach((menu) => {
    if (!menu.classList.contains("hidden")) {
      menu.classList.add("hidden");
      const popperId = menu.dataset.popperId;
      hidePopper(popperId);
    }
  });
}

function showPopper(popperId) {
  if (!popperInstance[popperId]) return;
  popperInstance[popperId].setOptions((options) => ({
    ...options,
    modifiers: [
      ...options.modifiers,
      { name: "eventListeners", enabled: true },
    ],
  }));
  popperInstance[popperId].update();
}

function hidePopper(popperId) {
  if (!popperInstance[popperId]) return;
  popperInstance[popperId].setOptions((options) => ({
    ...options,
    modifiers: [
      ...options.modifiers,
      { name: "eventListeners", enabled: false },
    ],
  }));
}
