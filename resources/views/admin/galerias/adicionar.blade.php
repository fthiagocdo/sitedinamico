@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row section">
	        <a href="{{ route('admin.principal') }}" class="bcrumb">Início</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <a href="{{ route('admin.imoveis') }}" class="bcrumb">Lista de Imóveis</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <a href="{{ route('admin.galerias', $imovel->id) }}" class="bcrumb">Galeria de Imagens</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <span class="blue-grey-text text-darken-1 bold">Adicionar Imagem</span>
	        <div class="divider"></div>
		</div>

		<h2 class="center-align">Adicionar Imagem</h2>	

		<div class="row">
			<form action="{{ route('admin.galerias.salvar', $imovel->id) }}" method="post" enctype="multipart/form-data">
				
			{{ csrf_field() }}

			@include('admin.galerias._form')

			<button class="btn waves-effect waves-light blue-grey darken-1">Adicionar</button>
			</form>
		</div>	
	</div>

@endsection