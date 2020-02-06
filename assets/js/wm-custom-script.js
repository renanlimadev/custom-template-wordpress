$(document).ready(function() {
    $(window).scroll(function() {
       if($(this).scrollTop() >= 100) { 
           $('#nav-top').removeClass('nav-transparent');
           $('#nav-top').addClass('nav-light shadow-sm');

           $('#logo-top').removeClass('light-logo');
           $('#logo-top').addClass('color-logo');
       } else {
           $('#nav-top').removeClass('nav-light shadow-sm');
           $('#nav-top').addClass('nav-transparent');

           $('#logo-top').removeClass('color-logo');
           $('#logo-top').addClass('light-logo');
       }
    });
});
