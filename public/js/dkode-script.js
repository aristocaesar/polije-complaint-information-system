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
