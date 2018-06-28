@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row section">
	        <a href="{{ route('admin.principal') }}" class="bcrumb">Início</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <span class="blue-grey-text text-darken-1 bold">Lista de Tipos</span>
	        <div class="divider"></div>
		</div>

		<h2 class="center-align">Lista de Tipos</h2>

		<div class="row">
			<table class="striped">
				<thead>
					<tr>
						<th style="width: 90%;">Título</th>
						<th style="width: 10%;">Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($registros as $registro)
					<tr>
						<td>{{ $registro->titulo }}</td>
						<td>
							<a class="btn-icon" href="{{ route('admin.tipos.editar', $registro->id) }}"><i class="small material-icons">edit</i></a>
							<a class="btn-icon" href="javascript: if(confirm('Deletar registro?')){ window.location.href = '{{ route('admin.tipos.deletar', $registro->id) }}' }"><i class="small material-icons">delete</i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
				<a class="btn waves-effect waves-light blue-grey darken-1" href="{{ route('admin.tipos.adicionar') }}">Adicionar</a>
			</div>
	</div>

@endsection