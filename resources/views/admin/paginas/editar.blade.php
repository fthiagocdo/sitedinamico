@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row section">
	        <a href="{{ route('admin.principal') }}" class="bcrumb">Início</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <a href="{{ route('admin.paginas') }}" class="bcrumb">Lista de Páginas</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <span class="blue-grey-text text-darken-1 bold">Editar Página</span>
	        <div class="divider"></div>
		</div>

		<h2 class="center-align">Editar Página</h2>	

		<div class="row">
			<form action="{{ route('admin.paginas.atualizar', $pagina->id) }}" method="post" enctype="multipart/form-data">
				
			{{ csrf_field() }}

			<input type="hidden" name="_method" value="put">

			@include('admin.paginas._form')

			<button class="btn waves-effect waves-light blue-grey darken-1">Atualizar</button>
			</form>
		</div>	
	</div>

@endsection