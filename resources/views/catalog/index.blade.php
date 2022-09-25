@extends('layout.master')
@section('contenido')
<div class="row mt-4">
    @foreach( $peliculas as $key => $pelicula ) 
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">
        <a href="{{ url('/catalog/show/' . $pelicula->id) }}">
        <img src="{{$pelicula->poster}}" style="height:200px;border: 3px solid rgb(126, 126, 126)"/> 
                <h4 style="min-height:45px;margin:5px 0 10px 0;color: rgb(108, 127, 190)">
                    {{$pelicula->title}}
                </h4>
        </a>
        </div>
        @endforeach
</div>
@endsection