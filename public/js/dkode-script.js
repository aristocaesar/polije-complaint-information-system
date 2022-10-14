// Navbar
$(window).scroll(function () {
  if ($(this).scrollTop() > 50) {
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
  $("#form-content #form-pengaduan").show();
  $("#form-content #form-aspirasi").hide();
  $("#form-content #form-informasi").hide();
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
  $("#form-content #form-pengaduan").show();
  $("#form-content #form-aspirasi").hide();
  $("#form-content #form-informasi").hide();
}
function klafisikasiAspirasi() {
  klafisikasi = "aspirasi";
  setInfoKlafisikasi(
    klafisikasi,
    "Perhatikan Cara Menyampaikan Aspirasi Yang Baik dan Benar",
    "ini deskripsi panduan aspirasi"
  );
  $("#form-content #form-pengaduan").hide();
  $("#form-content #form-aspirasi").show();
  $("#form-content #form-informasi").hide();
}
function klafisikasiInformasi() {
  klafisikasi = "informasi";
  setInfoKlafisikasi(
    klafisikasi,
    "Perhatikan Cara Mendapatkan Informasi Yang Baik dan Benar",
    "ini deskripsi panduan informasi"
  );
  $("#form-content #form-pengaduan").hide();
  $("#form-content #form-aspirasi").hide();
  $("#form-content #form-informasi").show();
}

// USER MENU
// Default menu selected
formSelected("laporan");
userMenuSelected($("#card-menu-user .card-body #user-menu").children()[0]);
function userMenuSelected(e) {
  const userMenuItems = $("#card-menu-user .card-body #user-menu").children();
  for (let i = 0; i < userMenuItems.length; i++) {
    if (e.id == userMenuItems[i].id) {
      userMenuItems[i].classList.remove("btn-white");
      userMenuItems[i].classList.add("btn-blue-active");
      formSelected(e.id);
    } else {
      userMenuItems[i].classList.add("btn-white");
      userMenuItems[i].classList.remove("btn-blue-active");
      formSelected(e.id);
    }
  }
}
function formSelected(e) {
  if (e == "laporan") {
    $("#card-user-laporan").show();
    $("#card-user-setting").hide();
    $("#btn-create-new-laporan").show();
  } else {
    $("#card-user-laporan").hide();
    $("#card-user-setting").show();
    $("#btn-create-new-laporan").hide();
  }
}

// USER MENU VERIFIKASI
// Default menu selected
userVerifikasiSelected($("#inputStatus")[0]);
function userVerifikasiSelected(e) {
  let menuSelected = e.selectedOptions[0].value;
  let form = $("#form-verifikasi")[0];
  for (let index = 0; index < form.children.length; index++) {
    let selected = form.children[index].id;
    if (selected.includes(menuSelected)) {
      // Set Form Selected
      let allForm = $("#form-verifikasi")[0].children;
      for (let i = 0; i < allForm.length; i++) {
        if (allForm[i].id.includes(selected)) {
          allForm[i].style.display = "block";
        } else {
          allForm[i].style.display = "none";
        }
      }
    }
  }
}
