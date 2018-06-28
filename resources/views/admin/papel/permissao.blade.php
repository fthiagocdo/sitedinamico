@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row section">
	        <a href="{{ route('admin.principal') }}" class="bcrumb">Início</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <a href="{{ route('admin.papel') }}" class="bcrumb">Lista de Papéis</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <span class="blue-grey-text text-darken-1 bold">Lista de Permissões</span>
	        <div class="divider"></div>
		</div>

		<h2 class="center-align">Lista de Permissões para {{ $papel->nome }}</h2>	

		<div class="row">
			<form action="{{ route('admin.papel.permissao.salvar', $papel->id) }}" method="post">

				{{ csrf_field() }}

				<div class="col s12 m4">
					<div class="input-field">
						<select name="permissao_id">
							@foreach($permissoes as $permissao)
							<option value="{{ $permissao->id }}">{{ $permissao->nome }}</option>
							@endforeach
						</select>
						<label>Permissão</label>
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
						<th style="width: 30%;">Permissão</th>
						<th style="width: 60%;">Descrição</th>
						<th style="width: 10%;">Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($papel->permissoes as $permissao)
					<tr>
						<td>{{ $permissao->nome }}</td>
						<td>{{ $permissao->descricao }}</td>
						<td>
							<a class="btn-icon" href="javascript: if(confirm('Deletar papel?')){ window.location.href = '{{ route('admin.papel.permissao.deletar', [$papel->id, $permissao->id]) }}' }"><i class="small material-icons">delete</i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection