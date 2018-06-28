@extends('layouts.app')

@section('content')

<div class="row"></div>
<div class="container">
		<div class="login-container">
			<div class="login-wrap">
				<form action="{{route('admin.login')}}" method="post">
					{{csrf_field()}}
					@include('admin.login._form')
					<div class="row" align="center">
						<button class="btn waves-effect waves-light blue-grey darken-1 login-btn">Entrar</button>
					</div>
				</form>
			</div>
		</div>
</div>



@endsection