@extends('layout.master')
{{-- @section('navbar')

	
@endsection --}}
@section('contenido')
	{{-- <div class="title m-b-md">
		<br>Hola {{ $create ?? 'sin nombre' }} 
		
	</div> --}}
	<div class="row" style="margin-top:20px">

		<div class="col-md-offset-3 col-md-6">
	
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title text-center">
						<span class="glyphicon glyphicon-film" aria-hidden="true"></span>
						@if (isset($pelicula))
							Editar Película
						@else Añadir película
						@endif
					</h3>
				</div>
	
				<div class="panel-body" style="padding:30px">
				
					{{-- TODO: Abrir el formulario e indicar el método POST --}}
					<form action="{{ isset($pelicula)?url('catalog/edit/'.$pelicula->id):url('catalog') }}" method="post">
						{{-- TODO: Protección contra CSRF --}}
						@csrf
						@if (isset($pelicula))
							@method('PUT')
						@endif
						<div class="form-group">
							<label for="title">Título</label>
							<input type="text" name="title" id="title" class="form-control" value="{{ $pelicula->title ?? '' }}">
						</div>
	
						<div class="form-group">
							{{-- TODO: Completa el input para el año --}}
							<label for="year">Año</label>
							<input type="text" name="year" id="year" class="form-control" value="{{ $pelicula->year ?? '' }}">
						</div>
	
						<div class="form-group">
							{{-- TODO: Completa el input para el director --}}
							<label for="director">Director</label>
							<input type="text" name="director" id="director" class="form-control" value="{{ $pelicula->director ?? '' }}">
						</div>
	
						<div class="form-group">
							{{-- TODO: Completa el input para el poster --}}
							<label for="poster">Poster</label>
							<br>
							<input type="text" name="poster" id="poster" class="form-control" value="{{ $pelicula->poster ?? '' }}">
						</div>
	
						<div class="form-group">
							<label for="synopsis">Resumen</label>
							<textarea name="synopsis" id="synopsis" class="form-control" rows="3">{{ $pelicula->synopsis ?? '' }}</textarea>
						</div>
	
						<div class="form-group text-center">
							<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
								Añadir película
							</button>
						</div>
	
					{{-- TODO: Cerrar formulario --}}
					</form>
				</div>
			</div>
		</div>
	</div>
@stop