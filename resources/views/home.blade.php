@extends('layouts.app')
@section('title') Inicio @endsection
@section('content')
<meta name="csrf-token-terminal" content="{{ csrf_token() }}">
<div class="container" id="inicio">

    <p><span class="title">Soinuka</span>
    <br>
    @if(\Cookie::get('idioma') && \Cookie::get('idioma') == "eus")
    <span class="sub-title">Ekitaldietarako argi eta soinu profesionalean espezialistak.</span></p>
    @else
    <span class="sub-title">Especialistas en iluminación y sonido profesional para eventos.</span></p>
    @endif

</div>
<div class="container2">
@if(\Cookie::get('clave') && \Crypt::decryptString(\Cookie::get('clave')) === \Crypt::decryptString($master_key->master_key))
<a href="{{route('admin')}}" class="panel-button"  style="color:#fff; text-decoration:none;">Ir al panel</a>
@endif

    @if(\Cookie::get('idioma') && \Cookie::get('idioma') == "eus")
    <div id="quienes-somos" class="sub-container2"><span class="title-preform" style=" text-align:center;">Nor Gara?</span>
        <br>
        <span class="sub-title2"> Soinuka sound and light 2020 ean soinu eta argiztapen sektorean esperientzia handiko gazte talde 
            batek sorturiko enpresa bat da. Helburu nagusia, bezeroek eskaturiko betekizunei audio eta argiztapen konponbideak eskeintzea da, 
            dauden egoera ezberdinei aurre eginez eta hauei moldatuz, beti ere ahalik eta konponbide pertsonalizatu eta merkeena eskainiz, 
            bezeroen asebetetzea bermatuz.

            Jorratzen diren ekitaldi ezberdinen artean, barietate zabala dago, unean dugun edozein bezerorentzat:

            Ezkontzak, festa pribatuak, kontzertu, banda edota bertsolarien sonorizazioak, meeting eta krosentzako megafonia, 
            Diskojaia edozein adineko ikuslerentzat, soinu ekipoen alokairua, azoka berezien sonorizazioa, etab. 
        </span>
    </div>

    <br>
    <br>
    <br>
    <div><span class="title-preform" style=" text-align:center;">Aurkitu gaitzazu</span>
        <br>
        <br>
        <a target="_blank" href="https://www.google.com/maps/place/Soinuka/@43.1937133,-2.0587245,15z/data=!4m2!3m1!1s0x0:0x4cff01540b8b0153?sa=X&ved=2ahUKEwjsy6Pnia3sAhVnAmMBHVASC40Q_BIwE3oECBYQBQ">
            <img src="{{'assets/images/maps.jpg'}}"/>
        </a>
        <span class="sub-title2" style="margin: 0px auto;">Egin klik irudian mapan sartzeko!
        </span>
    </div>


    @else
    <div id="quienes-somos" class="sub-container2"><span class="title-preform" style=" text-align:center;">¿Quiénes somos?</span>
        <br>
        <span class="sub-title2">
            Soinuka sound and light es una empresa creada en 2020 por un equipo de profesionales jóvenes pero con gran experiencia en el 
            sector con la idea de ofrecer soluciones de audio e iluminación siempre cumpliendo los requerimientos de los clientes, amoldándose a 
            distintas situaciones en las que se ofrecen soluciones totalmente personalizadas y económicas que garanticen la satisfacción de estos.

            Entre los distintos eventos que realizamos hay una gran variedad dirigida a distintos clientes como:

            Bodas, fiestas privadas, sonorización de bandas, conciertos o bertsolaris, megafonía para meetings o carreras populares, Diskojaia para todo tipo
            de públicos, alquiler de equipos de audio para particulares, sonorización de ferias, etc. 
        </span>
    </div>
    <br>
    <br>
    <br>
    <div>
        <span class="title-preform" style=" text-align:center;">encuéntranos</span>
        <br>
        <a target="_blank" href="https://www.google.com/maps/place/Soinuka/@43.1937133,-2.0587245,15z/data=!4m2!3m1!1s0x0:0x4cff01540b8b0153?sa=X&ved=2ahUKEwjsy6Pnia3sAhVnAmMBHVASC40Q_BIwE3oECBYQBQ">
            <img src="{{'assets/images/maps.jpg'}}"/>
        </a>
        <span class="sub-title2">Click en la imagen para acceder al mapa!
        </span>
    </div>

    <br>
    <br>
    <br>
    @endif
    <div class="sub-container2">
        @if(\Cookie::get('idioma') && \Cookie::get('idioma') == "eus")
        <span class="title-preform" style=" text-align:center;">Lan egiten dugun markak</span>
        @else
        <span class="title-preform" style=" text-align:center;">Marcas con las que trabajamos</span>
        @endif
        <br>
        <div style="width:100%; display:flex; justify-content:space-around; align-items:center; flex-wrap:wrap; background-color:rgba(72, 72, 72, 0.3)">
            <img src="{{'assets/images/brands/adj.png'}}"/>
            <img src="{{'assets/images/brands/akg.png'}}"/>
            <img src="{{'assets/images/brands/bose.png'}}"/>
            <img src="{{'assets/images/brands/cordial.png'}}"/>
            <img src="{{'assets/images/brands/midas.png'}}"/>
            <img src="{{'assets/images/brands/neutrik.png'}}"/>
            <img src="{{'assets/images/brands/rfc.png'}}"/>
            <img src="{{'assets/images/brands/shennheiser.png'}}"/>
            <img src="{{'assets/images/brands/shure.png'}}"/>
            <img src="{{'assets/images/brands/soundcraft.png'}}"/>
            <img src="{{'assets/images/brands/turbosound.png'}}"/>
        </div>
    </div>

</div>

<div class="container2" id="eventos" style="margin-top: 200px; min-height: 50vh;">

    <div class="sub-eventos">
        @if(\Cookie::get('idioma') && \Cookie::get('idioma') == "eus")
        <span class="title-preform" style=" text-align:center;">Urtean gertaerak</span>
        @else
        <span class="title-preform" style=" text-align:center;">Eventos EN</span>
        
        @endif
            <form autocomplete="off" style="margin:0px; margin-left:20px;">
                <select class="event-year">
                    <option selected hidden value="{{\Carbon\Carbon::now()->format('Y')}}">{{\Carbon\Carbon::now()->format('Y')}} <i class="fas fa-chevron-down"></i></option>
                    @for($i=0; $i <= \Carbon\Carbon::now()->diffInYears($startDate); $i++)
                        <option value="202{{$i}}">202{{$i}}</option>
                    @endfor
                </select>
            </form>
    </div>
    
    @include('events_partial')

</div>

<div class="container2" id="contacto" style="margin-top: 100px;min-height: 50vh; display:flex; flex-direction:column; justify-content:center;">

    @if(\Cookie::get('idioma') && \Cookie::get('idioma') == "eus")
    <span class="title-preform" style=" text-align:center;">Jarri gurekin harremanetan!</span>
    <br>
    <br>
    <br>
    <a class="subject subject1 w-75" style="margin:0px auto;color:#fff;" target="_blank" href="mailto:soinuka@gmail.com?Subject=Kaixo%20arratsaldeon%20nahi%20dut%kontaktua%rekin%20Soinuka">Posta email</a>
    <br>
    <a target="_blank" class="subject subject2 mt-2  w-75" style="margin:0px auto;color:#fff;" href="https://web.whatsapp.com/send?phone=34638388388&text=Sartu+zure+mezua+hemen&app_absent=0">Rentzat Whatsapp</a>
    @else
    <span class="title-preform" style=" text-align:center;">¡Contacta con nosotros!</span>
    <br>
    <br>
    <br>
    <div style="display:flex; justify-content:center; align-items:center; flex-wrap:wrap;">
    <a  target="_blank"  class="subject subject1 w-75" style="margin:0px auto;color:#fff;" href="mailto:soinuka@gmail.com?Subject=Hola%20buenas%20tardes%20deseo%20contactar%20con%20Soinuka">Por email</a>
    <a target="_blank" class="subject subject2 mt-2 w-75" style="margin:0px auto;color:#fff;" href="https://web.whatsapp.com/send?phone=34638388388&text=Introduzca+aqu%C3%AD+su+mensaje&app_absent=0">Por Whatsapp</a>
    </div>
    @endif
    <br>
    <br>
    <div class="email-div">
        <span class="email-logo">@</span>
        <span class="email">Soinuka.info@gmail.com</span>
    </div>

    <div class="tlf-div">
        <i class="fa fa-phone-alt tlf-logo"></i>
        <span class="tlf">+34 638 38 83 88</span>
    </div>

</div>



<img class="arrow-down" src="{{'assets/images/arrow-down.gif'}}"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script>


   

    $( document ).ready(function() {
        const navHeight = 110;

        cookie_url = 'inicio/get-cookie';
        $.ajax({
            url: cookie_url,
            method: 'GET'
            }).done(function (res) {
                const cookie = JSON.parse(res);
                Cookies.set('cookie', cookie);
        });

        $( ".arrow-down" ).click(function() {
            $('html, body').animate({
                scrollTop: $("#quienes-somos").offset().top-navHeight
            }, 1000);
        });

        $( ".arrow-up" ).click(function() {
            $('body, html').animate({
			scrollTop: '0px'
		    }, 1000);
        });

        $( ".event-year" ).change(function() {
            $(".pre").fadeOut();
            var year = $(this).val();
            $.ajax({
            url: '{{url('get-events')}}' +'/'+ year,
            method: 'GET'
            }).done(function (res) {
                var events = JSON.parse(res);
                if(events.length > 0){
                    $(".no_events").remove().fadeOut();
                    $(".post").fadeOut();
                    events.forEach( function(valor, indice) {
                        var url = 'admin/get-event-image/'+valor.image;
                        if(Cookies.get('cookie') === 'es'){
                            $(".accordion").append('<div class="post box" style="background-image: url('+url+');"> <div> <div class="text"> <p class="accordion-title">'+valor.name_es+'</p> <p class="accordion-sub-title">'+valor.desc_es+'</p> </div> </div></div>').fadeIn();   
                        }else{
                            $(".accordion").append('<div class="post box" style="background-image: url('+url+');"> <div> <div class="text"> <p class="accordion-title">'+valor.name_eus+'</p> <p class="accordion-sub-title">'+valor.desc_eus+'</p> </div> </div></div>').fadeIn();   
                        }
                        
                    });

                    
                }else{
                    if($(".no_events").length < 1){
                        $(".accordion").fadeOut();
                        if(Cookies.get('cookie') === 'es'){
                            $(".pre-accordion").append('<p class="no_events" style="width:100%; text-align:center; color:red; font-size:18px; font-weight: bold; font-family: "Montserrat", Arial, Helvetica, sans-serif;">No hay eventos disponibles para el año elegido. Por favor, escoge otro año.</p>').fadeIn();    
                        }else{
                            $(".pre-accordion").append('<p class="no_events" style="width:100%; text-align:center; color:#ff4250; padding:10px; background-color: rgba(72, 72, 72, 0.3); font-size:18px; font-weight: bold; font-family: "Montserrat", Arial, Helvetica, sans-serif;">Aukeratutako urterako ez dago ekitaldirik eskuragarri. Mesedez, aukeratu beste urte bat.</p>').fadeIn();    
                        }
                    }
                   
                    
                }
                
            });

        });

        
        $(".subject2").click(function() {
                console.log("A");
                $('callbell-container_integrations').css('opacity', 1);
                $('callbell-container_integrations').css('pointer-events', 'auto');
            });


    });
</script>
@endsection
