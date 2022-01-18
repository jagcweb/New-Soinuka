<link rel="stylesheet" href="{{'assets/css/styles.css'}}">
    <header id="header">
        <div class="logo-div" style="padding:0px; margin:0px;">
        <a><img id="logo" src="{{'assets/images/logoSoinuka.png'}}"/></a>
        </div>

        
          
        <div id="burger">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
    </header>

    <ul id="ul" class="stroke">
        @if(\Cookie::get('idioma') && \Cookie::get('idioma') == "eus")
            <li id="inicio-nav"><a>Hasiera</a></li>
            <li id="quienes-somos-nav"><a>Nor gara?</a></li>
            <li id="eventos-nav"><a>Ekitaldiak</a></li>
            <li id="contacto-nav"><a>Kontaktua</a></li>
            <li id="inicio-nav"><a><span class="es">ES</span></a></li>
        @else
            <li id="inicio-nav"><a>Inicio</a></li>
            <li id="quienes-somos-nav"><a>¿Quiénes somos?</a></li>
            <li id="eventos-nav"><a>Eventos</a></li>
            <li id="contacto-nav"><a>Contacto</a></li>
            <li id="inicio-nav"><a><span class="eus">EUS</span></a></li>
        @endif
        </ul>

    <div class="contain">
        @yield('content')
        <img class="arrow-up" style="transform:rotate(180deg); display:none;" src="{{'assets/images/arrow-down.gif'}}"/>
    </div>