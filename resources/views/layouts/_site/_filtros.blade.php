<div class="row">
	<form action="{{ route('site.busca') }}">
		<div class="input-field col s6 m4">
		    <select name="status">
		      <option value="0">Todos</option>
		      <option value="aluga" {{ isset($busca['status']) && $busca['status'] == 'aluga' ? 'selected' : '' }}>Aluga</option>
		      <option value="vende" {{ isset($busca['status']) && $busca['status'] == 'vende' ? 'selected' : '' }}>Vende</option>
		    </select>
		    <label>Status</label>
		</div>
		<div class="input-field col s6 m4">
		    <select name="tipo_id">
	    		<option value="0">Todos</option>
		    	@foreach($tipos as $tipo)
		      	<option value="{{ $tipo->id }}" {{ isset($busca['tipo_id']) && $busca['tipo_id'] == $tipo->id ? 'selected' : '' }}>{{ $tipo->titulo }}</option>
		    	@endforeach
		    </select>
		    <label>Tipo de imóvel</label>
		</div>
	    <div class="input-field col s6 m4">
		    <select name="cidade_id">
		      <option value="0">Todas</option>
		    	@foreach($cidades as $cidade)
		      	<option value="{{ $cidade->id }}" {{ isset($busca['cidade_id']) && $busca['cidade_id'] == $cidade->id ? 'selected' : '' }}>{{ $cidade->nome }}</option>
		    	@endforeach
		    </select>
		    <label>Cidade</label>
		</div>
		<div class="input-field col s6 m3">
		    <select name="dormitorios">
		      <option value="0">Todos</option>
		      <option value="1" {{ isset($busca['dormitorios']) && $busca['dormitorios'] == '1' ? 'selected' : '' }}>1</option>
		      <option value="2" {{ isset($busca['dormitorios']) && $busca['dormitorios'] == '2' ? 'selected' : '' }}>2</option>
		      <option value="3" {{ isset($busca['dormitorios']) && $busca['dormitorios'] == '3' ? 'selected' : '' }}>3</option>
		      <option value="4" {{ isset($busca['dormitorios']) && $busca['dormitorios'] == '4' ? 'selected' : '' }}>Mais</option>
		    </select>
		    <label>Dormitórios</label>
		</div>
		<div class="input-field col s12 m4">
		    <select name="valor">
		      <option value="0">Todos</option>
		      <option value="1" {{ isset($busca['valor']) && $busca['valor'] == '1' ? 'selected' : '' }}>Até R$ 500,00</option>
		      <option value="2" {{ isset($busca['valor']) && $busca['valor'] == '2' ? 'selected' : '' }}>De R$ 500,00 a R$ 1.000,00</option>
		      <option value="3" {{ isset($busca['valor']) && $busca['valor'] == '3' ? 'selected' : '' }}>De R$1.000,00 a R$ 5.000,00</option>
		      <option value="4" {{ isset($busca['valor']) && $busca['valor'] == '4' ? 'selected' : '' }}>De R$ 5.000,00 a RS 10.000,00</option>
		      <option value="5" {{ isset($busca['valor']) && $busca['valor'] == '5' ? 'selected' : '' }}>De R$ 10.000,00 a RS 50.000,00</option>
		      <option value="6" {{ isset($busca['valor']) && $busca['valor'] == '6' ? 'selected' : '' }}>De R$ 50.000,00 a RS 100.000,00</option>
		      <option value="7" {{ isset($busca['valor']) && $busca['valor'] == '7' ? 'selected' : '' }}>De R$ 100.000,00 a RS 200.000,00</option>
		      <option value="8" {{ isset($busca['valor']) && $busca['valor'] == '8' ? 'selected' : '' }}>De R$ 200.000,00 a RS 500.000,00</option>
		      <option value="9" {{ isset($busca['valor']) && $busca['valor'] == '9' ? 'selected' : '' }}>Acima de RS 500.000,00</option>
		    </select>
		    <label>Valor</label>
		</div>
		<div class="input-field col s12 m3">
		    <input class="validate" type="text" name="bairro" value="{{ isset($busca['bairro']) ? $busca['bairro'] : '' }}">
		    <label>Bairros</label>
		</div>
		<div class="input-field col s12 m2">
		    <button class="btn waves-effect waves-light deep-orange darken-1 right">Filtrar</button>
		</div>
	</form>
</div>