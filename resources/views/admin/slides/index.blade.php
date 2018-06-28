@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row section">
	        <a href="{{ route('admin.principal') }}" class="bcrumb">Início</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <span class="blue-grey-text text-darken-1 bold">Galeria de Slides</span>
	        <div class="divider"></div>
		</div>

		<h2 class="center-align">Galeria de Slides</h2>	

		<div class="row">
			<table class="striped">
				<thead>
					<tr>
						<th style="width: 12%;">Imagem</th>
						<th style="width: 10%;">Ordem</th>
						<th style="width: 20%;">Título</th>
						<th style="width: 25%;">Descrição</th>
						<th style="width: 25%;">Link</th>
						<th style="width: 8%;">Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($registros as $registro)
					<tr>
						<td><img src="{{ asset($registro->imagem) }}" width="100"/></td>
						<td>{{ $registro->ordem }}</td>
						<td>{{ $registro->titulo }}</td>
						<td>{{ $registro->descricao }}</td>
						<td>{{ $registro->link }}</td>
						<td>
							<a class="btn-icon" href="{{ route('admin.slides.editar', $registro->id) }}"><i class="small material-icons">edit</i></a>
							<a class="btn-icon" href="javascript: if(confirm('Deletar registro?')){ window.location.href = '{{ route('admin.slides.deletar', $registro->id) }}' }"><i class="small material-icons">delete</i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
				<a class="btn waves-effect waves-light blue-grey darken-1" href="{{ route('admin.slides.adicionar') }}">Adicionar</a>
			</div>
	</div>

@endsection