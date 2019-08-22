window.onscroll = function() {
  var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
  if (isMobile) {
    MobileFunction()
  } else {
    DesktopFunction()
  }
};

var navbar = document.getElementById("sticky_navbar");
var sticky = navbar.offsetTop;

function DesktopFunction() {
  var page_url = $(location).attr("href");
  if (!page_url.includes('member') && !page_url.includes("reset_password")) {
    var page_name = page_url.slice(BASE_URL.length+1);
    var no_banners = ["login", "signup", "news", "terms"];
    if (page_name.includes("news")) {
      no_banners.push(page_name);
    }
    if (window.pageYOffset > sticky) {
      navbar.classList.add("sticky");
      $(".brand-box > .img-responsive").attr('src', '/assets/img/accessoslo-gray-logo.svg');
      $(".accessoslo > .wrapper-general").attr('style', 'padding-top: 78px;');
      $(".accessoslo-home > .wrapper-general").attr('style', 'padding-top: 70px;');
      $(".navbar").removeClass("navbar-accessoslo-transparent");
      $(".navbar").addClass("navbar-accessoslo");
    } else {
      navbar.classList.remove("sticky");
      $(".accessoslo > .wrapper-general").attr('style', 'padding-top: 0px;');
      if (!no_banners.includes(page_name)) {
        $(".navbar").removeClass("navbar-accessoslo");
        $(".navbar").addClass("navbar-accessoslo-transparent");
        $(".brand-box > .img-responsive").attr('src', '/assets/img/accessoslo-white-logo.svg');
      }
    }
  }
}

function MobileFunction() {
  if (window.pageYOffset > sticky) {
    navbar.classList.add("sticky");
    $(".accessoslo > .wrapper-general").attr('style', 'padding-top: 78px;');
    $(".accessoslo-home > .wrapper-general").attr('style', 'padding-top: 70px;');
  } else {
    navbar.classList.remove("sticky");
    $(".accessoslo > .wrapper-general").attr('style', 'padding-top: 0px;');
  }
}
//flagStrap
$("#footer_language").countrySelect({
  preferredCountries: ['us', 'no']
});
$("#footer_language").on('change', function () {
  var lang = $("#footer_language").countrySelect("getSelectedCountryData");
  $("#selected_lang").val(lang.name);
  $("#lang-form").trigger('submit');
});