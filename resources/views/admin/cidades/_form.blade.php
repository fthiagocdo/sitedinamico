<div class="input-field">
	<input class="validate" type="text" name="nome" value="{{ isset($registro->nome) ? $registro->nome : '' }}">
	<label>Nome</label>
</div>
<div class="input-field">
	<input class="validate" type="text" name="estado" value="{{ isset($registro->estado) ? $registro->estado : '' }}">
	<label>Estado</label>
</div>
<div class="input-field">
	<input class="validate" type="text" name="sigla_estado" value="{{ isset($registro->sigla_estado) ? $registro->sigla_estado : '' }}">
	<label>Sigla</label>
</div>