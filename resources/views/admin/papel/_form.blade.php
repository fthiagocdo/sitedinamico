<div class="input-field">
	<input class="validate" type="text" name="nome" value="{{ isset($registro->nome) ? $registro->nome : '' }}">
	<label>Nome</label>
</div>
<div class="input-field">
	<input class="validate" type="text" name="descricao" value="{{ isset($registro->descricao) ? $registro->descricao : '' }}">
	<label>Descrição</label>
</div>