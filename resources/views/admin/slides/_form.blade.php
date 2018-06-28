@if(isset($registro->imagem))
<div class="row">
	<div class="col s12 m4">
		<div class="input-field">
			<input class="validate" type="text" name="ordem" value="{{ isset($registro->ordem) ? $registro->ordem : '' }}">
			<label>Ordem</label>
		</div>
	</div>
	<div class="col s12 m8">
		<div class="input-field">
			<input class="validate" type="text" name="titulo" value="{{ isset($registro->titulo) ? $registro->titulo : '' }}">
			<label>Título</label>
		</div>
	</div>
</div>
<div class="input-field">
	<input class="validate" type="text" name="descricao" value="{{ isset($registro->descricao) ? $registro->descricao : '' }}">
	<label>Descrição</label>
</div>
<div class="input-field">
	<input class="validate" type="text" name="link" value="{{ isset($registro->link) ? $registro->link : '' }}">
	<label>Link</label>
</div>
<div class="row valign-wrapper">
	<div class="col m4 s12">
	@if(isset($registro->imagem))
		<img class="responsive-img" src="{{ asset($registro->imagem) }}" width="300">
	@endif
	</div>
	<div class="file-field input-field col m8 s12">
		<div class="btn waves-effect waves-light blue-grey darken-1">
			<span>Imagem</span>
			<input type="file" name="imagem">
		</div>
		<div class="file-path-wrapper">
			<input class="file-path validate" type="text" name="">
		</div>
	</div>
</div>
<div class="row">
	<div class="col s12 m2">
		<div class="input-field">
			<select name="publicado">
				<option value="sim" {{ isset($registro->publicado) && $registro->publicado == 'sim' ? 'selected' : '' }}>Sim</option>
				<option value="nao" {{ isset($registro->publicado) && $registro->publicado == 'nao' ? 'selected' : '' }}>Não</option>
			</select>
			<label>Publicar?</label>
		</div>
	</div>
</div>

@else

<div class="row">
	<div class="file-field input-field col m12 s12">
		<div class="btn waves-effect waves-light blue-grey darken-1">
			<span>Upload de Imagens</span>
			<input type="file" multiple name="imagens[]">
		</div>
		<div class="file-path-wrapper">
			<input class="file-path validate" type="text" name="">
		</div>
	</div>
</div>

@endif