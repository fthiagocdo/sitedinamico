@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row section">
	        <a href="{{ route('admin.principal') }}" class="bcrumb">Início</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <a href="{{ route('admin.imoveis') }}" class="bcrumb">Lista de Imóveis</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <span class="blue-grey-text text-darken-1 bold">Editar Imóvel</span>
	        <div class="divider"></div>
		</div>

		<h2 class="center-align">Editar Imóvel</h2>	

		<div class="row">
			<form action="{{ route('admin.imoveis.atualizar', $registro->id) }}" method="post" enctype="multipart/form-data">
				
			{{ csrf_field() }}

			<input type="hidden" name="_method" value="put">

			@include('admin.imoveis._form')

			<button class="btn waves-effect waves-light blue-grey darken-1">Atualizar</button>
			</form>
		</div>	
	</div>

@endsection