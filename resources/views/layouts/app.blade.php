<!doctype html>
<html>
  <head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="{{'assets/css/styles.css'}}">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <title>Soinuka | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{'assets/images/logoSoinuka1.png'}}">


  </head>
  
  <body id="body" style="background: url({{url('admin/get-image/'.$image->name)}}) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;"> 
  <div class="loader-container">
    <div class="loader lds-ripple"><div></div><div></div></div>
  </div>

  <!-- Cookie Consent by https://www.FreePrivacyPolicy.com -->
<script type="text/javascript" src="//www.freeprivacypolicy.com/public/cookie-consent/4.0.0/cookie-consent.js" charset="UTF-8"></script>
<script type="text/javascript" charset="UTF-8">
document.addEventListener('DOMContentLoaded', function () {
cookieconsent.run({"notice_banner_type":"interstitial","consent_type":"express","palette":"dark","language":"es","page_load_consent_levels":["strictly-necessary"],"notice_banner_reject_button_hide":false,"preferences_center_close_button_hide":false,"page_refresh_confirmation_buttons":false,"website_name":"Soinuka","website_privacy_policy_url":"https://www.privacypolicies.com/live/7f80d590-c04c-4d76-a712-9e3ec911bb5d"});
});
</script>

<noscript>Cookie Consent by <a href="https://www.freeprivacypolicy.com/" rel="nofollow noopener">Free Privacy Policy website</a></noscript>
<!-- End Cookie Consent -->


<script>
  window.addEventListener('load', () => {
  document.querySelector('.loader-container').style.display ="none";
})

</script>


    @include('layouts.app_partial')

    <footer id="footer">

      <span><a class="fb" href="https://www.facebook.com/Soinukazizurkil" target="_blank">f</a></span>
      <span><a class="insta" href="https://instagram.com/soinuka?igshid=17g6l6kobqkzj" target="_blank">i</a></span>
    </footer>
    <a  class="author" href="https://www.linkedin.com/in/jos%C3%A9-antonio-garc%C3%ADa-carmona-1970581b2/" target="_blank">© 2021 - JAGCWEB FOR SOINUKA</a>
  </body>
</html>

<script src="/js/app.js"></script>
  <script src="/js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Start of Async Callbell Code -->
<script>
  window.callbellSettings = {
    token: "fmAHaVWoWovV9soZTmK8Jd6e"
  };
</script>
<script>

  $( document ).ready(function() {

    $(this).scrollTop(0); //Back to topside after refresh

    //Get Image Random
    random_img_url = 'admin/get-image-random';
    var intervalId = window.setInterval(function(){
      changeBg();
    }, 30000);

    function changeBg(){
      $.ajax({
          url: random_img_url,
          method: 'GET'
        }).done(function (res) {
          var image = JSON.parse(res);
          var image_url = 'admin/get-image/'+image.name;
          $('#body').css('background-image', 'url(' + image_url + ')');
        });
    }

    //Change Language
    $( ".es" ).click(function() {

      value = 'es';
      $.ajax({
          url: '{{url('inicio')}}' +'/'+ 'set-cookie' + '/' + value,
          method: 'GET'
      }).done(function (res) {
          location.reload();
      });

    });

    $( ".eus" ).click(function() {
      value = 'eus';
      $.ajax({
          url: '{{url('inicio')}}' +'/'+ 'set-cookie' + '/' + value,
          method: 'GET'
      }).done(function (res) {
          location.reload();
      });
    });
    /*********************************/

    //Burger Menu Logic
    burger = $("#burger");
    ul = $("#ul");
    const li_links = document.querySelectorAll('#ul li');
    
    burger.click(function() {
      burgerMenu();
    });

    ul.click(function() {
      burgerMenu();
    });

    function burgerMenu(){
      if(burger.hasClass('toggle')){
        burger.removeClass('toggle');
        ul.css("transform", `translateX(100%)`);

        window.onscroll = null;
      }else{
        burger.addClass('toggle');
        ul.css("transform", `translateX(0px)`);

        var x = window.scrollX;
        var y = window.scrollY;
        window.onscroll = function(){ window.scrollTo(x, y)};
      }

      li_links.forEach((link, index) => {
        if (link.style.animation ) {
          
          link.style.animation ='';
        } else {
          link.style.animation = `navLinkFade 0.5s ease forwards ${index / 6 + 0.6}s`
        }
      });
    }
    /*********************************/

      const pageWidth = window.innerWidth;
      const navHeight = 110;

    //Arrow up (home) scroll
    $(document).scroll(function () {
      
      var $header = $("#header");
      var $logo_div = $(".logo-div");
      $header.toggleClass('scrolled', $(this).scrollTop() > $header.height());
      $logo_div.toggleClass('scrolled', $(this).scrollTop() > $header.height());

          var $nav = $("#nav");
          $nav.toggleClass('scrolled', $(this).scrollTop() > $header.height());

          if( $(this).scrollTop() >=$("#quienes-somos").offset().top-navHeight){
              $('.arrow-up').fadeIn();

          }else{
              $('.arrow-up').fadeOut();
              
          }

    });
    /*********************************/
    

    //Menu scrolls

    $("#inicio-nav").click(function() {
        $('html, body').animate({
            scrollTop: $("#inicio").offset().top-navHeight
        }, 2000);
    });

    $("#quienes-somos-nav").click(function() {
        $('html, body').animate({
            scrollTop: $("#quienes-somos").offset().top-navHeight
        }, 2000);
    });

    $("#eventos-nav").click(function() {
        $('html, body').animate({
            scrollTop: $("#eventos").offset().top-navHeight
        }, 2000);
    });

    $("#contacto-nav").click(function() {
        $('html, body').animate({
            scrollTop: $("#contacto").offset().top-navHeight
        }, 2000);
    });
    /*********************************/
    
  });
  </script>
