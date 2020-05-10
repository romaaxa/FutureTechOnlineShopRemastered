$(function () {
      menu = $('nav ul');

      $('#toggle-btn').on('click', function (e) {
            e.preventDefault();
            menu.slideToggle();
      });

      $(window).resize(function () {
            var w = $(this).width();
            if (w > 580 && menu.is(':hidden')) {
                  menu.removeAttr('style');
            }
      });

      $('nav li').on('click', function (e) {
            var w = $(window).width();
            if (w < 580) {
                  menu.slideToggle();
            }
      });
      $('.open-menu').height($(window).height());
});

//scrolling

$('a[href*="#"]')
      .not('[href="#"]')
      .not('[href="#0"]')
      .click(function (event) {
            if (
                  location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                  &&
                  location.hostname == this.hostname
            ) {
                  var target = $(this.hash);
                  target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                  if (target.length) {
                        event.preventDefault();
                        $('html, body').animate({
                              scrollTop: target.offset().top
                        }, 1000, function () {
                              var $target = $(target);
                              $target.focus();
                              if ($target.is(":focus")) {
                                    return false;
                              } else {
                                    $target.attr('tabindex', '-1');
                                    $target.focus();
                              };
                        });
                  }
            }
      });

//date
var timeOc = setInterval(myTimer, 1000);
function myTimer() {
      var t = new Date();
      document.getElementById("date").innerHTML = t.toLocaleTimeString();
}

//new page effect

$(document).ready(function () {
      $("body").css("display", "none");

      $("body").fadeIn(2000);

      $("a.transition").click(function (event) {
            event.preventDefault();
            linkLocation = this.href;
            $("body").fadeOut(1000, redirectPage);
      });

      function redirectPage() {
            window.location = linkLocation;
      }
});

//maximize photo

$(function () {
      $('.minimized').click(function (event) {
            var i_path = $(this).attr('src');
            $('body').append('<div id="overlay"></div><div id="magnify"><img src="' + i_path + '"><div id="close-popup"><i></i></div></div>');
            $('#magnify').css({
                  left: ($(document).width() - $('#magnify').outerWidth()) / 2,
                  // top: ($(document).height() - $('#magnify').outerHeight())/2 upd: 24.10.2016
                  top: ($(window).height() - $('#magnify').outerHeight()) / 2
            });
            $('#overlay, #magnify').fadeIn('fast');
      });

      $('body').on('click', '#close-popup, #overlay', function (event) {
            event.preventDefault();

            $('#overlay, #magnify').fadeOut('fast', function () {
                  $('#close-popup, #magnify, #overlay').remove();
            });
      });
});

