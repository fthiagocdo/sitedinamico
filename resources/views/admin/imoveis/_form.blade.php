<div class="input-field">
	<input class="validate" type="text" name="titulo" value="{{ isset($registro->titulo) ? $registro->titulo : '' }}">
	<label>Título</label>
</div>

<div class="input-field">
	<textarea class="materialize-textarea" name="descricao">{{ isset($registro->descricao) ? $registro->descricao : '' }}</textarea>
	<label>Descrição</label>
</div>
<div class="row valign-wrapper">
	<div class="col m4 s12">
		<img class="responsive-img" src="{{ isset($registro->imagem) ? asset($registro->imagem) : asset('img/modelo_img_home.jpg') }}" width="300">
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
	<div class="col s12 m6">
		<div class="input-field">
			<select name="status">
				<option value="aluga" {{ isset($registro->status) && $registro->status == 'aluga' ? 'selected' : '' }}>Aluga</option>
				<option value="vende" {{ isset($registro->status) && $registro->status == 'vende' ? 'selected' : '' }}>Vende</option>
			</select>
			<label>Status</label>
		</div>
	</div>
	<div class="col s12 m6">
		<div class="input-field">
			<select name="tipo_id">
				@foreach($tipos as $tipo)
				<option value="{{ $tipo->id }}" {{ isset($registro->tipo_id) && $registro->tipo_id == $tipo->id ? 'selected' : '' }}>{{ $tipo->titulo }}</option>
				@endforeach
			</select>
			<label>Tipo de imóvel</label>
		</div>
	</div>
</div>
<div class="row">
	<div class="col s12 m2">
		<div class="input-field">
			<input class="validate" type="text" name="cep" value="{{ isset($registro->cep) ? $registro->cep : '' }}">
			<label>Cep (Ex.: 99999-999)</label>
		</div>
	</div>
	<div class="col s12 m6">
		<div class="input-field">
			<input class="validate" type="text" name="endereco" value="{{ isset($registro->endereco) ? $registro->endereco : '' }}">
			<label>Endereço</label>
		</div>
	</div>
	<div class="col s12 m4">
		<div class="input-field">
			<select name="cidade_id">
				@foreach($cidades as $cidade)
				<option value="{{ $cidade->id }}" {{ isset($registro->cidade_id) && $registro->cidade_id == $cidade->id ? 'selected' : '' }}>{{ $cidade->nome }}</option>
				@endforeach
			</select>
			<label>Cidade</label>
		</div>
	</div>
</div>
<div class="row">
	<div class="col s12 m6">
		<div class="input-field">
			<input class="validate" type="text" name="valor" value="{{ isset($registro->valor) ? $registro->valor : '' }}">
			<label>Valor (Ex.: 999,99)</label>
		</div>
	</div>
	<div class="col s12 m6">
		<div class="input-field">
			<input class="validate" type="text" name="dormitorios" value="{{ isset($registro->dormitorios) ? $registro->dormitorios : '' }}">
			<label>Dormitórios (Ex.: 3)</label>
		</div>
	</div>
</div>
<div class="row">
	<div class="col s12 m6">
		<div class="input-field">
			<textarea class="materialize-textarea" name="detalhes">{{ isset($registro->detalhes) ? $registro->detalhes : '' }}</textarea>
			<label>Detalhes</label>
		</div>
	</div>
	<div class="col s12 m6">
		<div class="input-field">
			<textarea class="materialize-textarea" name="mapa">{{ isset($registro->mapa) ? $registro->mapa : '' }}</textarea>
			<label>Mapa (Cole o código gerado pelo Google Maps)</label>
		</div>
	</div>
</div>
<div class="row">
	<div class="col s12 m2">
		<div class="input-field">
			<select name="publicar">
				<option value="sim" {{ isset($registro->publicar) && $registro->publicar == 'sim' ? 'selected' : '' }}>Sim</option>
				<option value="nao" {{ isset($registro->publicar) && $registro->publicar == 'nao' ? 'selected' : '' }}>Não</option>
			</select>
			<label>Publicar?</label>
		</div>
	</div>
</div>