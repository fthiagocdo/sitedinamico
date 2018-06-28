<div class="input-field">
	<input class="validate" type="text" name="titulo" value="{{ isset($pagina->titulo) ? $pagina->titulo : '' }}">
	<label>Título</label>
</div>
<div class="input-field">
	<input class="validate" type="text" name="descricao" value="{{ isset($pagina->descricao) ? $pagina->descricao : '' }}">
	<label>Descrição</label>
</div>
@if(isset($pagina->email))
<div class="input-field">
	<input class="validate" type="text" name="email" value="{{ isset($pagina->email) ? $pagina->email : '' }}">
	<label>E-mail</label>
</div>
@endif
<div class="input-field">
	<textarea class="materialize-textarea" name="texto">{{ isset($pagina->texto) ? $pagina->texto : '' }}</textarea>
	<label>Texto</label>
</div>
<div class="row valign-wrapper">
	<div class="col m4 s12">
	@if(isset($pagina->imagem))
		<img class="responsive-img" src="{{ asset($pagina->imagem) }}" width="300">
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
<div class="input-field">
	<textarea class="materialize-textarea" name="mapa">{{ isset($pagina->mapa) ? $pagina->mapa : '' }}</textarea>
	<label>Mapa</label>
</div>