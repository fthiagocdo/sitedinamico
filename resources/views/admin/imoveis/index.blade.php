@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row section">
	        <a href="{{ route('admin.principal') }}" class="bcrumb">Início</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <span class="blue-grey-text text-darken-1 bold">Lista de Imóveis</span>
	        <div class="divider"></div>
		</div>

		<h2 class="center-align">Lista de Imóveis</h2>	

		<div class="row">
			<table class="striped">
				<thead>
					<tr>
						<th style="width: 8%;">Cod.</th>
						<th style="width: 28%;">Título</th>
						<th style="width: 7%;">Status</th>
						<th style="width: 20%;">Cidade</th>
						<th style="width: 15%;">Valor</th>
						<th style="width: 10%;">Publicado</th>
						<th style="width: 12%;">Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($registros as $registro)
					<tr>
						<td>{{ str_pad($registro->id, 5, '0', STR_PAD_LEFT) }}</td>
						<td>{{ $registro->titulo }}</td>
						<td>{{ ucwords($registro->status) }}</td>
						<td>{{ $registro->cidade->nome }}</td>
						<td>R$ {{ number_format($registro->valor, 2, ",", ".") }}</td>
						<td>{{ ucwords($registro->publicar) }}</td>
						<td>
							<a class="btn-icon" href="{{ route('admin.galerias', $registro->id) }}"><i class="small material-icons">add_a_photo</i></a>
							<a class="btn-icon" href="{{ route('admin.imoveis.editar', $registro->id) }}"><i class="small material-icons">edit</i></a>
							<a class="btn-icon" href="javascript: if(confirm('Deletar registro?')){ window.location.href = '{{ route('admin.imoveis.deletar', $registro->id) }}' }"><i class="small material-icons">delete</i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
				<a class="btn waves-effect waves-light blue-grey darken-1" href="{{ route('admin.imoveis.adicionar') }}">Adicionar</a>
			</div>
	</div>

@endsection