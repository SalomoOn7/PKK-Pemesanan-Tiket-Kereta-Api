//Start Sidebar
document.querySelectorAll(".sidebar-dropdown-toggle").forEach(function (item) {
  item.addEventListener("click", function (e) {
    e.preventDefault();
    const parent = item.closest(".group");
    if (parent.classList.contains("selected")) {
      parent.classList.remove("selected");
    } else {
      document
        .querySelectorAll(".sidebar-dropdown-toggle")
        .forEach(function (i) {
          i.closest(".group").classList.remove("selected");
        });
      parent.classList.add("selected");
    }
  });
});
//End Sidebar
// Start : Popper
const popperInstance = {};

// Inisialisasi Popper untuk setiap dropdown
document.querySelectorAll(".dropdown").forEach((item, index) => {
  const popperId = "popper-" + index;
  const toggle = item.querySelector(".dropdown-toggle");
  const menu = item.querySelector(".dropdown-menu");

  if (!toggle || !menu) return; // Pastikan elemen ditemukan

  menu.dataset.popperId = popperId;
  popperInstance[popperId] = Popper.createPopper(toggle, menu, {
    placement: "bottom-end", // Atur posisi dropdown
    modifiers: [
      { name: "offset", options: { offset: [0, 8] } },
      { name: "preventOverflow", options: { boundary: document.body } },
    ],
  });

  // Event listener untuk toggle dropdown
  toggle.addEventListener("click", function (e) {
    e.stopPropagation(); // Mencegah event bubbling

    // Tutup semua dropdown lain sebelum membuka yang baru
    hideDropdown();

    const popperId = menu.dataset.popperId;

    // Toggle dropdown yang diklik
    if (menu.classList.contains("hidden")) {
      menu.classList.remove("hidden");
      showPopper(popperId);
    } else {
      menu.classList.add("hidden");
      hidePopper(popperId);
    }
  });
});

// Event listener untuk klik di luar dropdown
document.addEventListener("click", function (e) {
  if (!e.target.closest(".dropdown")) {
    hideDropdown();
  }
});

// Fungsi untuk menyembunyikan semua dropdown
function hideDropdown() {
  document.querySelectorAll(".dropdown-menu").forEach((menu) => {
    if (!menu.classList.contains("hidden")) {
      menu.classList.add("hidden");
      const popperId = menu.dataset.popperId;
      hidePopper(popperId);
    }
  });
}

// Fungsi untuk menampilkan Popper
function showPopper(popperId) {
  if (!popperInstance[popperId]) return; // Cek apakah instance ada
  popperInstance[popperId].setOptions((options) => ({
    ...options,
    modifiers: [
      ...options.modifiers,
      { name: "eventListeners", enabled: true },
    ],
  }));
  popperInstance[popperId].update();
}

// Fungsi untuk menyembunyikan Popper
function hidePopper(popperId) {
  if (!popperInstance[popperId]) return; // Cek apakah instance ada
  popperInstance[popperId].setOptions((options) => ({
    ...options,
    modifiers: [
      ...options.modifiers,
      { name: "eventListeners", enabled: false },
    ],
  }));
}

// End : Popper
