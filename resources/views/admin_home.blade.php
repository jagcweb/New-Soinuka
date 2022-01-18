@extends('layouts.admin')
@section('title') Inicio @endsection
@section('content')
@include('partial_msg')
<a href="{{route('home')}}" class="panel-button" style="color:#fff; text-decoration:none;">Volver a la web</a>
@if(!is_object($master_key))
    <form method="POST" action="{{route('masterkey.save')}}" style="font-family: 'Montserrat'; width:100%; min-height:100vh; display:flex; justify-content:center; align-items:center; flex-wrap:wrap; flex-direction:column; color:#fff;">
        @csrf
        <label style="font-size:20px; text-align:center;">Crear clave maestra (min 8 caracteres)</label>
        <input type="password" required name="key" placeholder="Introducir clave" style="width:90%; height:30px; font-size:24px; margin-top:20px;"/>
        <input type="password" required name="key_confirm" placeholder="Confirmar clave" style="width:90%; height:30px; font-size:24px; margin-top:20px;"/>
        <button style="cursor:pointer; width:90%; border:2px solid #fff; background:none; pointer-events:auto; color:#fff; font-size:24px;  margin-top:20px;">Enviar</button>
    </form>
    @else
    @if(\Cookie::get('clave') && \Crypt::decryptString(\Cookie::get('clave')) === \Crypt::decryptString($master_key->master_key))
    <div style="width:100%; display:flex; justify-content:center; align-items:center; flex-wrap:wrap;">

        <div class="center">
        <p style="font-size:25px; font-family: 'Montserrat'; color:#fff;">Panel de administración</p>
        <div class="menu" style="margin-top:50px;">
            <li class="item" id="images">
                <a href="#images" class="btn" style="font-size:18px!important;"><i class="far fa-images"></i> Imagenes</a>
                <div class="smenu">
                    <a style="color:#fff;" href="#" data-toggle="modal" data-target="#create-image">Crear</a>
                    <a style="color:#fff;" href="{{route('admin.images')}}">Ver</a>
                </div>
            </li>
            <li class="item" id="events">
                <a href="#events" class="btn" style="font-size:18px!important;"><i class="far fa-calendar-alt"></i> Eventos</a>
                <div class="smenu">
                    <a style="color:#fff;" href="#" data-toggle="modal" data-target="#create-event">Crear</a>
                    <a style="color:#fff;" href="{{route('admin.events')}}">Ver</a>
                </div>
            </li>
        </div>
    </div>
    </div>
    @else
            @if($master_key->tries > 0)
            <form method="POST" action="{{route('masterkey.match')}}" style="font-family: 'Montserrat'; width:100%; min-height:100vh; display:flex; justify-content:center; align-items:center; flex-wrap:wrap; flex-direction:column; color:#fff;">
                @csrf
                <label style="font-size:20px; text-align:center;">Introduce la clave maestra ({{$master_key->tries}} intentos restantes)</label>
                <input type="password" required name="key" style="width:90%; height:30px; font-size:24px; margin-top:20px;"/>
                <button style="cursor:pointer;  width:90%; border:2px solid #fff; background:none; pointer-events:auto; color:#fff; font-size:24px;  margin-top:20px;">Enviar</button>
                <a href="{{route('masterkey.generate')}}" style="width:90%; text-align:center; text-decoration:none; border:2px solid #fff; background:none; pointer-events:auto; color:#fff; font-size:24px;  margin-top:50px;">Generar nueva clave</a>
            </form>
            @else
            <div style="width:100%; min-height:100vh; display:flex; justify-content:center; align-items:center; flex-wrap:wrap;">
            <a href="{{route('masterkey.generate')}}" style="width:90%; text-align:center; text-decoration:none; border:2px solid #fff; background:none; pointer-events:auto; color:#fff; font-size:24px;  margin-top:50px;">Generar nueva clave</a>
            </div>
            @endif
        @endif
    @endif


@include('modals.modal_new_image')
@include('modals.modal_new_event')

@endsection