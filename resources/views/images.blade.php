@extends('layouts.admin')
@section('title') Inicio @endsection
@section('content')
@include('partial_msg')
    <p style="color:#fff; font-size:24px; width:100%; text-align:center; margin-top:20px;">Imágenes de fondo</p>
    <a href="{{route('admin')}}" title="Volver"  style="color:#fff; text-decoration:none; font-size:40px; margin-left:20px;"><i class="fas fa-arrow-left"></i></a>
    <div class="div_image">
        @foreach($images as $image)
        <div class="sub-div_image">
            <a href="#" class="absolute left" data-toggle="modal" data-target="#edit-image-{{$image->id}}">Editar</a>
            <a href="#"  class="absolute right" data-toggle="modal" data-target="#delete-image-{{$image->id}}">Eliminar</a>
            <img class="image_image" src="{{url('admin/get-image/'.$image->name)}}"/>
        </div>
        @include('modals.modal_edit_image')
        @include('modals.modal_delete_image')
        @endforeach
    <div>

    <style>
        .sub-div_image{
            width: 30%;
            position:relative;
            border:1px solid white;
            margin:10px;
        }
        .absolute{
            position:absolute;
            top:5%;
            padding: 5px;
            background: #1d1d1d;
            text-decoration: none;
            font-size: 14px;
            color: black    ;
        }

        .left{
            left:5%;
            background: #fff;   
        }

        .right{
            right:5%;
            background:#cc1717;
        }

        .image_image{
            width:100%;
            object-fit: contain;
        }

        .div_image{
            width:100%;
            min-height:50vh;
            display:flex;
            justify-content:space-between;
            flex-wrap:wrap;
            align-content:start;
        }

        @media screen and (max-width:1200px){

            .sub-div_image{
                width:46%;
            }
        }

        @media screen and (max-width:500px){

            .sub-div_image{
                width:100%;
            }
        }
    </style>

@endsection