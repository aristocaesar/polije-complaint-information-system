$(document).ready(function () {
  // ASK TO GET CURRENT LOCATION

  // DATA TABLES
  // $("#dataTableLaporan").DataTable();

  // Navbar
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $(".navbar-user").removeClass("bg-transparent");
      $(".navbar-user").addClass("bg-white drop-shadow-lg");
      let navHorizontal = $(".nav-items-horizontal");
      for (let i = 0; i < navHorizontal.length; i++) {
        navHorizontal[i].classList.remove("text-white");
        navHorizontal[i].classList.remove("hover:text-gray-200");
        navHorizontal[i].classList.add("text-gray-800");
        navHorizontal[i].classList.add("hover:text-gray-800");
      }
      // BTN MASUK
      $("#nav-items-btn-masuk-hor").removeClass(
        "text-white hover:text-gray-200"
      );
      $("#nav-items-btn-masuk-hor").addClass(
        "text-gray-800 hover:text-gray-900"
      );
      // BTN DAFTAR
      $("#nav-items-btn-daftar-hor").removeClass("border");
      $("#nav-items-btn-daftar-hor").addClass("bg-blue-800 hover:bg-blue-900");
      // BTN VERTIKAL
      $("#nav-menu-open").addClass("text-gray-800");
    } else {
      $(".navbar-user").removeClass("bg-white drop-shadow-lg");
      $(".navbar-user").addClass("bg-transparent");
      let navHorizontal = $(".nav-items-horizontal");
      for (let i = 0; i < navHorizontal.length; i++) {
        navHorizontal[i].classList.add("text-white");
        navHorizontal[i].classList.add("hover:text-gray-200");
        navHorizontal[i].classList.remove("text-gray-800");
        navHorizontal[i].classList.remove("hover:text-gray-800");
      }
      // BTN MASUK
      $("#nav-items-btn-masuk-hor").removeClass(
        "text-gray-800 hover:text-gray-900"
      );
      $("#nav-items-btn-masuk-hor").addClass("text-white hover:text-gray-200");
      // BTN DAFTAR
      $("#nav-items-btn-daftar-hor").removeClass(
        "bg-blue-800 hover:bg-blue-900"
      );
      $("#nav-items-btn-daftar-hor").addClass("border");
      // BTN VERTIKAL
      $("#nav-menu-open").removeClass("text-gray-800");
    }
  });

  // Navbar toogle menu
  $("#nav-menu-open").click(() => {
    $("#navVertikal").removeClass("-right-full");
    $("#navVertikal").addClass("right-0");
  });

  $("#nav-menu-close").click(() => {
    $("#navVertikal").removeClass("right-0");
    $("#navVertikal").addClass("-right-full");
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
  $(".user-menu-items").click((e) => {
    const target = e.currentTarget.id;
    const userMenuItems = $("#user-menu").children();
    for (let i = 0; i < userMenuItems.length; i++) {
      // Set style on menu items
      if (target == userMenuItems[i].id) {
        userMenuItems[i].classList.add("text-white", "bg-blue-800");
        userMenuItems[i].classList.remove("text-blue-800", "bg-white");
      } else {
        userMenuItems[i].classList.remove("text-white", "bg-blue-800");
        userMenuItems[i].classList.add("text-blue-800", "bg-white");
      }
    }
    formSelected(target);
  });
  function formSelected(e) {
    if (e == "laporan") {
      $("#content-user-laporan").show();
      $("#content-user-setting").hide();
    } else if (e == "pengaturan") {
      $("#content-user-laporan").hide();
      $("#content-user-setting").show();
    }
  }

  // USER MENU VERIFIKASI
  // Default menu selected
  userVerifikasiSelected($("#inputStatus")[0] ?? null);
  function userVerifikasiSelected(e) {
    if (e != null) {
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
  }
});
