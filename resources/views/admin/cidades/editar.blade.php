@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row section">
	        <a href="{{ route('admin.principal') }}" class="bcrumb">Início</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <span class="blue-grey-text text-darken-1 bold">Editar Cidade</span>
	        <div class="divider"></div>
		</div>

		<h2 class="center-align">Editar Cidade</h2>	

		<div class="row">
			<form action="{{ route('admin.cidades.atualizar', $registro->id) }}" method="post">
				
			{{ csrf_field() }}

			<input type="hidden" name="_method" value="put">

			@include('admin.cidades._form')

			<button class="btn waves-effect waves-light blue-grey darken-1">Atualizar</button>
			</form>
		</div>	
	</div>

@endsection