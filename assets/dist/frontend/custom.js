/*!
 * Start Bootstrap - New Age v4.0.0-beta (http://startbootstrap.com/template-overviews/new-age)
 * Copyright 2013-2017 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-new-age/blob/master/LICENSE)
 */
!function(a){"use strict";a('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=a(this.hash);if((e=e.length?e:a("[name="+this.hash.slice(1)+"]")).length)return a("html, body").animate({scrollTop:e.offset().top-48},1e3,"easeInOutExpo"),!1}}),a(".js-scroll-trigger").click(function(){a(".navbar-collapse").collapse("hide")}),a("body").scrollspy({target:"#mainNav",offset:54}),a(window).scroll(function(){a("#mainNav").offset().top>100?a("#mainNav").addClass("navbar-shrink"):a("#mainNav").removeClass("navbar-shrink")})}(jQuery);
$(document).ready(function() {
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-info").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below
    $(this).removeClass("btn-default").addClass("btn-info");
});
if(page_name === 'home'){
  //alert();
}

if(page_name === 'campaign_detail'){
   $("#participate").click(function(e){
       var user_id = $(this).attr('user_id');
       var campaign_id = $(this).attr('campaign_id');
       var sendInfo = {
           "user_id": user_id,
           "campaign_id": campaign_id
       }
       $.ajax({
        type: "POST",
        url: "rest/tryCampaign",
        dataType: "json",
                  data: sendInfo,
        success: function (response) {
            if (response.status === 'true') {
                  console.log(response);
            } else {

            }
        }


    });
   });
}

if(page_name === 'login'){

}

if(page_name === 'profile'){
  $(".logout").click(function(e){
      $.get( 'rest/logoutUser', function(response) {
          if (response.status === 'true') {
                   window.location.href="home";
               } else {

               }
         
});
  }) ;
    
    }
});
