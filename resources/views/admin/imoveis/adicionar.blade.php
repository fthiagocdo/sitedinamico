@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row section">
	        <a href="{{ route('admin.principal') }}" class="bcrumb">Início</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <a href="{{ route('admin.imoveis') }}" class="bcrumb">Lista de Imóveis</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <span class="blue-grey-text text-darken-1 bold">Adicionar Imóvel</span>
	        <div class="divider"></div>
		</div>

		<h2 class="center-align">Adicionar Imóvel</h2>	

		<div class="row">
			<nav>
			    <div class="nav-wrapper green">
			      <div class="col s12">
			        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
			        <a href="{{ route('admin.imoveis') }}" class="breadcrumb">Lista de Imóveis</a>
			        <a class="breadcrumb">Adicionar Imóvel</a>
			      </div>
			    </div>
			</nav>
		</div>
		<div class="row">
			<form action="{{ route('admin.imoveis.salvar') }}" method="post" enctype="multipart/form-data">
				
			{{ csrf_field() }}

			@include('admin.imoveis._form')

			<button class="btn waves-effect waves-light blue-grey darken-1">Adicionar</button>
			</form>
		</div>	
	</div>

@endsection