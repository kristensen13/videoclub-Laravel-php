@extends('layout.master')
@section('contenido')
{{-- <div class="text-center">Show</div> --}}
<div class="row">
	<div class="col-sm-4">
		<img src="{{ $pelicula->poster }}" alt="" class="img-fluid rounded mt-4">
	</div>
	<div class="col-sm-8 mt-5 mb-5">
		<h1>{{ $pelicula->title }}</h1>
		<h4>Año: {{ $pelicula->year }}</h4>
		<h4>Director: {{ $pelicula->director }}</h4>
		<br>
		<p>
			<strong>Resumen: </strong>{{ $pelicula->synopsis }}
		</p>
		<p>
			<strong>Estado: </strong>{{ $pelicula->rented?'Película Alquilada':'Película Disponible' }}
		</p>
		<div class="row">
		<form method="POST" action="{{ url('catalog/rented/'.$pelicula->id) }}">
			@csrf
			@method('PUT')
		@if ($pelicula->rented)
		<button type="button" class="btn btn-danger btn-sm ml-2">Devolver Película</button>
		@else
		<button type="button" class="btn btn-primary btn-sm ml-2">Alquilar Película</button>
		@endif
	</form>
		<a type="button" class="btn btn-warning btn-sm ml-2" href="{{ url('catalog/edit/'.$pelicula->id) }}">Editar Película</a>
		<a type="button" class="btn btn-secondary btn-sm ml-2" href="{{ url('/') }}">< Volver a la lista</a>
		<form method="POST" action="{{url('catalog/'.$pelicula->id)}}">
			@csrf
			@method('DELETE') 
			<button type="submit" class="btn btn-danger btn-sm ml-2">Borrar Pelicula</button>   
		</form>
	</div>
</div>
</div>

@endsection