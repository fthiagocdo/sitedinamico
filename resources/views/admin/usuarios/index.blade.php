@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row section">
	        <a href="{{ route('admin.principal') }}" class="bcrumb">Início</a>
	        <span class="blue-grey-text text-darken-1"> >> </span>
	        <span class="blue-grey-text text-darken-1 bold">Lista de Usuários</span>
	        <div class="divider"></div>
		</div>	
		
		<h2 class="center-align ">Lista de Usuários</h2>	

		<div class="row">
			<table class="striped">
				<thead>
					<tr>
						<th style="width: 5%">Id</th>
						<th style="width: 40%">Nome</th>
						<th style="width: 40%">E-mail</th>
						<th style="width: 15%">Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($usuarios as $usuario)
					<tr>
						<td>{{ $usuario->id }}</td>
						<td>{{ $usuario->name }}</td>
						<td>{{ $usuario->email }}</td>
						<td>
							<a class="btn-icon" href="{{ route('admin.usuarios.papel', $usuario->id) }}"><i class="small material-icons">assignment</i></a>
							<a class="btn-icon" href="{{ route('admin.usuarios.editar', $usuario->id) }}"><i class="small material-icons">edit</i></a>
							<a class="btn-icon" href="javascript: if(confirm('Deletar registro?')){ window.location.href = '{{ route('admin.usuarios.deletar', $usuario->id) }}' }"><i class="small material-icons">delete</i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
			<a class="btn waves-effect waves-light blue-grey darken-1" href="{{ route('admin.usuarios.adicionar') }}">Adicionar</a>
		</div>
	</div>

@endsection