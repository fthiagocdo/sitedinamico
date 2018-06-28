@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row section">
	        <a href="{{ route('admin.principal') }}" class="bcrumb">Início</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <a href="{{ route('admin.usuarios') }}" class="bcrumb">Lista de Usuários</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <span class="blue-grey-text text-darken-1 bold">Adicionar Usuário</span>
	        <div class="divider"></div>
		</div>

		<h2 class="center-align">Adicionar Usuário</h2>	

		<div class="row">
			<form action="{{ route('admin.usuarios.salvar') }}" method="post">
				
			{{ csrf_field() }}

			@include('admin.usuarios._form')

			<button class="btn waves-effect waves-light blue-grey darken-1">Adicionar</button>
			</form>
		</div>	
	</div>

@endsection