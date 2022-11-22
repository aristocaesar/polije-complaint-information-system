// BASE URL
const BaseUrl = "http://localhost/polije-complaint";

function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(";").shift();
}

// ASK TO GET CURRENT LOCATION
if (getCookie("location") == undefined) {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition((position, error) => {
      const latitude = position.coords.latitude;
      const longitude = position.coords.longitude;
      const location = latitude + "," + longitude;
      document.cookie = `location=${location}`;
      $("#lokasi").attr("value", location);
    });
  }
} else {
  $("#lokasi").attr("value", getCookie("location"));
}

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
    // BTN USER
    $("#nav-items-btn-user-hor").removeClass("text-white");
    $("#nav-items-btn-user-hor").addClass("text-gray-800 hover:text-gray-900");
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
    // BTN USER
    $("#nav-items-btn-user-hor").removeClass(
      "text-gray-800 hover:text-gray-900"
    );
    $("#nav-items-btn-user-hor").addClass("text-white hover:text-gray-200");
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

// Tracking Laporan
$(".state-not-found").hide();
$(".form-tracking").hide();
async function trackingLaporan(id) {
  if (id != "") {
    const idLaporan = id.replaceAll(/[0-9]/g, "");
    let klasifikasi = "informasi";
    if (idLaporan == "ADU") {
      klasifikasi = "pengaduan";
    } else if (idLaporan == "ASPI") {
      klasifikasi = "aspirasi";
    }
    const laporan = await fetch(`${BaseUrl}/api/${klasifikasi}/${id}`);
    const response = await laporan.json();
    const result = response.data;
    if (result.length != 0) {
      $(".state-not-found").hide();
      $(".form-tracking").show();
      $("#id-tracking-laporan").text(result.id);
      $("#tgl-tracking-laporan").text(moment(result.created_at).format("LLLL"));
      $("#nama-pelapor-tracking-laporan").text(result.pengirim);
      $("#judul-tracking-laporan").text(result.judul);
      $("#deskripsi-tracking-laporan").text(result.deskripsi);
      $("#kategori-tracking-laporan").text(result.kategori);
      $("#divisi-tracking-laporan").text(result.divisi);
      $("#status-tracking-laporan").text(result.status);
      if (result.lampiran == "" || result.lampiran == null) {
        $("#hasil-tracking-laporan").text("-");
      } else {
        $("#hasil-tracking-laporan").text(result.lampiran);
      }
      $("#hasil-tracking-laporan").attr(
        "href",
        `${BaseUrl}/public/upload/assets/document/${klasifikasi}/${result.lampiran}`
      );
    } else {
      $(".state-not-found").show();
      $(".form-tracking").hide();
    }
  } else {
    $(".state-not-found").hide();
    $(".form-tracking").hide();
  }
}
