@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row section">
	        <a href="{{ route('admin.principal') }}" class="bcrumb">Início</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <a href="{{ route('admin.usuarios') }}" class="bcrumb">Lista de Usuários</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <span class="blue-grey-text text-darken-1 bold">Lista de Papéis</span>
	        <div class="divider"></div>
		</div>	

		<h2 class="center-align">Lista de Papéis para {{ $usuario->name }}</h2>	

		<div class="row">
			<form action="{{ route('admin.usuarios.papel.salvar', $usuario->id) }}" method="post">

				{{ csrf_field() }}
				<div class="col s12 m4">
					<div class="input-field">
						<select name="papel_id">
							@foreach($papeis as $papel)
							<option value="{{ $papel->id }}">{{ $papel->nome }}</option>
							@endforeach
						</select>
						<label>Papel</label>
					</div>
				</div>
				<div class="col s12 m8 valign-wrapper" style="height: 100%;">
					<button class="btn-large waves-effect waves-light blue-grey darken-1">Adicionar</button>
				</div>
			</form>
		</div>

		<div class="row">
			<table class="striped">
				<thead>
					<tr>
						<th style="width: 30%;">Papel</th>
						<th style="width: 60%;">Descrição</th>
						<th style="width: 10%;">Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($usuario->papeis as $papel)
					<tr>
						<td>{{ $papel->nome }}</td>
						<td>{{ $papel->descricao }}</td>
						<td>
							<a class="btn-icon" href="javascript: if(confirm('Deletar papel?')){ window.location.href = '{{ route('admin.usuarios.papel.deletar', [$usuario->id, $papel->id]) }}' }"><i class="small material-icons">delete</i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection