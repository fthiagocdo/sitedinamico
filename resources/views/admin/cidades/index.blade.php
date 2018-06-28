@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row section">
	        <a href="{{ route('admin.principal') }}" class="bcrumb">Início</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <span class="blue-grey-text text-darken-1 bold">Lista de Cidades</span>
	        <div class="divider"></div>
		</div>

		<h2 class="center-align">Lista de Cidades</h2>	

		<div class="row">
			<table class="striped">
				<thead>
					<tr>
						<th style="width: 40%;">Nome</th>
						<th style="width: 30%;">Estado</th>
						<th style="width: 15%;">Sigla</th>
						<th style="width: 15%;">Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($registros as $registro)
					<tr>
						<td>{{ $registro->nome }}</td>
						<td>{{ $registro->estado }}</td>
						<td>{{ $registro->sigla_estado }}</td>
						<td>
							<a class="btn-icon" href="{{ route('admin.cidades.editar', $registro->id) }}"><i class="small material-icons">edit</i></a>
							<a class="btn-icon" href="javascript: if(confirm('Deletar registro?')){ window.location.href = '{{ route('admin.cidades.deletar', $registro->id) }}' }"><i class="small material-icons">delete</i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
				<a class="btn waves-effect waves-light blue-grey darken-1" href="{{ route('admin.cidades.adicionar') }}">Adicionar</a>
			</div>
	</div>

@endsection