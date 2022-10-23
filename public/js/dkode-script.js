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
    // BTN MASUK
    $("#nav-items-btn-masuk-hor").removeClass("text-white hover:text-gray-200");
    $("#nav-items-btn-masuk-hor").addClass("text-gray-800 hover:text-gray-900");
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
    $("#nav-items-btn-daftar-hor").removeClass("bg-blue-800 hover:bg-blue-900");
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

// KLASIFIKASI MENU
function Klasifikasi(e) {
  const btn = $("#btn-select-klasifikasi");
  const btnAll = btn.children();
  const form = $("#form-pai").children();
  for (let i = 0; i < form.length; i++) {
    if (btnAll[i].id == e.id) {
      btnAll[i].children[0].checked = true;
    } else {
      btnAll[i].children[0].checked = false;
    }
    if (form[i].id.includes(e.id)) {
      $(`#${form[i].id}`).show();
    } else {
      $(`#${form[i].id}`).hide();
    }
  }
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
      userMenuItems[i].classList.add(
        "text-white",
        "bg-blue-800",
        "hover:bg-blue-900"
      );
      userMenuItems[i].classList.remove(
        "text-blue-800",
        "hover:text-white",
        "bg-white"
      );
    } else {
      userMenuItems[i].classList.remove(
        "text-white",
        "bg-blue-800",
        "hover:bg-blue-900"
      );
      userMenuItems[i].classList.add(
        "text-blue-800",
        "hover:text-white",
        "bg-white"
      );
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

// MODAL FUCNTION
function Modal(target) {
  const modal = $(`#modal-${target}`)[0];
  modal.classList.remove("hidden");
  modal.classList.add("flex");
}
function ModalClose() {
  $(".modal").addClass("hidden");
  $(".modal").removeClass("flex");
}
