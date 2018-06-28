@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row section">
	        <a href="{{ route('admin.principal') }}" class="bcrumb">Início</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <span class="blue-grey-text text-darken-1 bold">Lista de Papéis</span>
	        <div class="divider"></div>
		</div>

		<h2 class="center-align">Lista de Papéis</h2>	

		<div class="row">
			<table class="striped">
				<thead>
					<tr>
						<th style="width: 30%;">Nome</th>
						<th style="width: 55%;">Descrição</th>
						<th style="width: 15%;">Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($registros as $registro)
					<tr>
						<td>{{ $registro->nome }}</td>
						<td>{{ $registro->descricao }}</td>
						<td>
							@if($registro->nome != 'admin')
							<a class="btn-icon" href="{{ route('admin.papel.permissao', $registro->id) }}"><i class="small material-icons">assignment</i></a>
							<a class="btn-icon" href="{{ route('admin.papel.editar', $registro->id) }}"><i class="small material-icons">edit</i></a>
							<a class="btn-icon" href="javascript: if(confirm('Deletar registro?')){ window.location.href = '{{ route('admin.papel.deletar', $registro->id) }}' }"><i class="small material-icons">delete</i></a>
							@endif
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
				<a class="btn waves-effect waves-light blue-grey darken-1" href="{{ route('admin.papel.adicionar') }}">Adicionar</a>
			</div>
	</div>

@endsection