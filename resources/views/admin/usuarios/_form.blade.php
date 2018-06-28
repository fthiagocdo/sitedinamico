<div class="input-field">
	<input class="validate" type="text" name="name" value="{{ isset($usuario->name) ? $usuario->name : '' }}">
	<label>Nome</label>
</div>
<div class="input-field">
	<input class="validate" type="text" name="email" value="{{ isset($usuario->email) ? $usuario->email : '' }}">
	<label>E-mail</label>
</div>
<div class="input-field">
	<input class="validate" type="password" name="password">
	<label>Senha</label> 
</div>