function checkAdmin() {
      var passw = "admin"
      var usern = "mainAdmin";
      var reg1 = new RegExp("^" + usern + "$");
      var reg2 = new RegExp("^" + passw + "$");
      if (reg2.test(document.loginForm.passwrd.value) && reg1.test(document.loginForm.usernm.value)) {
            document.location.href = "../adminStuff/adminPage.php";
      } else {
            alert('Incorrect password or username');
      }
      return false;
}

//switch pages and scroll
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

