<div class="row section">
	<h3 align="center">Imóveis</h3>
	<div class="divider"></div>
	<br>
	@include('layouts._site._filtros')
</div>
<div class="row section">
@foreach($imoveis as $imovel)
	<div class="col s12 m3">
		<div class="card">
			<div class="card-image">
				<a href="{{ route('site.imovel', [$imovel->id, str_slug($imovel->titulo, '_')]) }}"><img src="{{ asset($imovel->imagem) }}" alt="{{ $imovel->titulo }}"></a>
			</div>
			<div class="card-content" style="height: 180px;">
				<p><b class="deep-orange-text text-darken-1">{{ strtoupper($imovel->status) }}</b></p>
				<p><b>{{ $imovel->titulo }}</b></p>
				<p>{{ $imovel->descricao }}</p>
				<p>R$ {{ number_format($imovel->valor, 2, ",", ".") }}</p>
			</div>
			<div class="card-action center-align">
				<a href="{{ route('site.imovel', [$imovel->id, str_slug($imovel->titulo, '_')]) }}" class="bold deep-orange-text text-darken-1">Ver mais</a>
			</div>
		</div>
	</div>
@endforeach
</div>
<div class="row" align="center">
	{{ $imoveis->links() }}
</div>