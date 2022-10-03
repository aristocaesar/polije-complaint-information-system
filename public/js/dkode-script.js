// Navbar
$(window).scroll(function () {
  if ($(this).scrollTop() > 100) {
    $("nav").addClass("bg-white shadow");
    $(".nav-link").removeClass("text-white");
    $(".nav-link").addClass("text-dark");
    // Button masuk
    $(".btn-auth").children().first().addClass("text-dark");
    $(".btn-auth").children().first().removeClass("text-white");
    // Button Daftar
    $(".btn-auth").children().last().addClass("btn-dark-outline");
    $(".btn-auth").children().last().removeClass("btn-white-outline");
  } else {
    $("nav").removeClass("bg-white shadow");
    $(".nav-link").removeClass("text-dark");
    $(".nav-link").addClass("text-white");
    // Button masuk
    $(".btn-auth").children().first().addClass("text-white");
    $(".btn-auth").children().first().removeClass("text-dark");
    // Button Daftar
    $(".btn-auth").children().last().removeClass("btn-dark-outline");
    $(".btn-auth").children().last().addClass("btn-white-outline");
  }
});

// Form
let klafisikasi = "pengaduan";
defaultKlafisikasiLaporan();

function defaultKlafisikasiLaporan() {
  let items = $(".klafisikasi .klafisikasi-items").children();
  for (let index = 0; index < items.length; index++) {
    if (items[index].id != "pengaduan") {
      items[index].children[0].checked = false;
    } else {
      items[index].children[0].checked = true;
      klafisikasi = "pengaduan";
    }
  }
}

function klafisikasiLaporan(e) {
  let items = $(".klafisikasi .klafisikasi-items").children();
  for (let index = 0; index < items.length; index++) {
    if (items[index].id != e.id) {
      items[index].children[0].checked = false;
    } else {
      items[index].children[0].checked = true;
      if (e.id == "pengaduan") {
        klafisikasiPengaduan();
      } else if (e.id == "aspirasi") {
        klafisikasiAspirasi();
      } else {
        klafisikasiInformasi();
      }
    }
  }
}

function setInfoKlafisikasi(namaKlafisikasi, judulPanduan, deskripsiPanduan) {
  // Get Element
  let elementPanduan = $("#panduan-klafisikasi");
  let modalPanduan = $("#modalPanduan .modal-dialog .modal-content");
  // Set Element
  elementPanduan[0].textContent = judulPanduan;
  modalPanduan[0].children[0].children[0].textContent =
    namaKlafisikasi.toUpperCase();
  modalPanduan[0].children[1].textContent = deskripsiPanduan;
}

function klafisikasiPengaduan() {
  klafisikasi = "pengaduan";
  setInfoKlafisikasi(
    klafisikasi,
    "Perhatikan Cara Menyampaikan Pengaduan Yang Baik dan Benar",
    "ini deskripsi panduan pengaduan"
  );
}

function klafisikasiAspirasi() {
  klafisikasi = "aspirasi";
  setInfoKlafisikasi(
    klafisikasi,
    "Perhatikan Cara Menyampaikan Aspirasi Yang Baik dan Benar",
    "ini deskripsi panduan aspirasi"
  );
}

function klafisikasiInformasi() {
  klafisikasi = "informasi";
  setInfoKlafisikasi(
    klafisikasi,
    "Perhatikan Cara Mendapatkan Informasi Yang Baik dan Benar",
    "ini deskripsi panduan informasi"
  );
}
