@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row section">
	        <a href="{{ route('admin.principal') }}" class="bcrumb">Início</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <span class="blue-grey-text text-darken-1 bold">Lista de Páginas</span>
	        <div class="divider"></div>
		</div>

		<h2 class="center-align">Lista de Páginas</h2>	

		<div class="row">
			<table class="striped">
				<thead>
					<tr>
						<th style="width: 20%;">Título</th>
						<th style="width: 50%;">Descrição</th>
						<th style="width: 20%;">Tipo</th>
						<th style="width: 10%;">Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($paginas as $pagina)
					<tr>
						<td>{{ $pagina->titulo }}</td>
						<td>{{ $pagina->descricao }}</td>
						<td>{{ $pagina->tipo }}</td>
						<td>
							<a class="btn-icon" href="{{ route('admin.paginas.editar', $pagina->id) }}"><i class="small material-icons">edit</i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection