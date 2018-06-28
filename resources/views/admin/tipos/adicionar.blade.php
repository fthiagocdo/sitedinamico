@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row section">
	        <a href="{{ route('admin.principal') }}" class="bcrumb">Início</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <a href="{{ route('admin.tipos') }}" class="bcrumb">Lista de Tipos</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <span class="blue-grey-text text-darken-1 bold">Adicionar Tipo</span>
	        <div class="divider"></div>
		</div>

		<h2 class="center-align">Adicionar Tipo</h2>	

		<div class="row">
			<form action="{{ route('admin.tipos.salvar') }}" method="post">
				
			{{ csrf_field() }}

			@include('admin.tipos._form')

			<button class="btn waves-effect waves-light blue-grey darken-1">Adicionar</button>
			</form>
		</div>	
	</div>

@endsection