@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row section">
    	<h3 class="center-align">Contato</h3>
    	<div class="divider"></div>
    </div>
    <div class="row section">
    	<div class="col s12 m7">
    		<img class="responsive-img" src="{{ asset($pagina->imagem) }}" alt="">
    	</div>
    	<div class="col s12 m5">
    		<form class="col s12" action="{{ route('site.contato.enviar') }}" method="post">

                {{ csrf_field() }}

    			<div class="input-field">
    				<input type="text" name="nome" class="validate">
    				<label>Nome</label>
    			</div>
    			<div class="input-field">
    				<input type="text" name="email" class="validate">
    				<label>Email</label>
    			</div>
    			<div class="input-field">
    				<textarea class="materialize-textarea" name="mensagem"></textarea>
    				<label>Mensagem</label>
    			</div>
    			<button class="btn waves-effect waves-light deep-orange darken-1">Enviar</button>
    		</form>
    	</div>
    </div>
</div>
@endsection