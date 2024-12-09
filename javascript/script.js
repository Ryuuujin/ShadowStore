const menuBtn = document.getElementById("menu-btn");
const navMenu = document.getElementById("nav-menu");
const closeBtn = document.getElementById("close-btn");

// Menampilkan menu
menuBtn.addEventListener("click", () => {
  navMenu.classList.add("active");
});

// Menyembunyikan menu
closeBtn.addEventListener("click", () => {
  navMenu.classList.remove("active");
});

// Menutup menu jika klik di luar
document.addEventListener("click", (event) => {
  if (!navMenu.contains(event.target) && event.target !== menuBtn) {
    navMenu.classList.remove("active");
  }
});




const carouselImages = document.querySelector(".carousel-images");
const totalImages = document.querySelectorAll(".carousel-images img").length;

let currentIndex = 0;

function showNextImage() {
  currentIndex = (currentIndex + 1) % totalImages; // Loop kembali ke awal
  const offset = -currentIndex * 100; // Hitung offset berdasarkan index
  carouselImages.style.transform = `translateX(${offset}%)`;
}

// Auto-slide setiap 5 detik
setInterval(showNextImage, 5000);

  function displayJoki() {
    const jokiInfo = document.getElementById("joki-info");
    if (jokiInfo.style.display === "none") {
      jokiInfo.style.display = "block"; // Tampilkan elemen
    } else {
      jokiInfo.style.display = "none"; // Sembunyikan elemen
    }
  }

// Toggle dropdown list visibility
const languageBtn = document.getElementById("language-btn");
const languageList = document.getElementById("language-list");

languageBtn.addEventListener("click", () => {
  // Add or remove active class to slide up/down
  if (languageList.classList.contains("active")) {
    languageList.classList.remove("active");
    setTimeout(() => languageList.classList.add("hidden"), 300); // Delay for slide-out animation
  } else {
    languageList.classList.remove("hidden");
    setTimeout(() => languageList.classList.add("active"), 10); // Allow transition to start
  }
});

// Handle language selection
const languageItems = document.querySelectorAll(".language-item");

languageItems.forEach((item) => {
  item.addEventListener("click", (event) => {
    const selectedFlag = item.querySelector(".flag-icon").src;
    const selectedCountry = item.querySelector("span").textContent;

    // Update button with selected language
    languageBtn.querySelector(".flag-icon").src = selectedFlag;
    languageBtn.querySelector("span").textContent = selectedCountry;

    // Close the dropdown
    languageList.classList.remove("active");
    setTimeout(() => languageList.classList.add("hidden"), 300);
  });
});


// JavaScript untuk menampilkan pop-up modal dengan animasi
window.onload = function () {
  var modal = document.getElementById('alertModal');
  var closeBtn = document.getElementById('closeModal');
  
  // Tampilkan modal setelah halaman dimuat dengan animasi fade-in
  modal.classList.add('show');

  // Tutup modal ketika tombol close ditekan dengan animasi fade-out
  closeBtn.onclick = function () {
    modal.classList.add('hide');
    
    // Setelah animasi selesai, sembunyikan modal
    setTimeout(function () {
      modal.style.display = 'none';
    }, 500); // Waktu delay sesuai dengan durasi animasi fade-out
  }

  // Tutup modal jika area luar modal diklik dengan animasi fade-out
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.classList.add('hide');
      setTimeout(function () {
        modal.style.display = 'none';
      }, 500); // Waktu delay sesuai dengan durasi animasi fade-out
    }
  }
}
