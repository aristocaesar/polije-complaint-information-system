$(document).ready(function () {
  // ASK TO GET CURRENT LOCATION
  // DATA TABLES
  $("#dataTableLaporan").DataTable();

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
    }
  });

  // Navbar toogle menu
  $("#nav-menu-open").show();
  $("#nav-menu-close").hide();

  function toogleMenu(e) {
    console.log(e);
    // if (e.includes("open")) {
    //   $("#nav-menu-open").show();
    //   $("#nav-menu-close").hide();
    // } else {
    //   $("#nav-menu-open").hide();
    //   $("#nav-menu-close").show();
    // }
  }

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
