<nav class="blue-grey darken-1">
  <div class="nav-wrapper">
    <div class="container">
      <a href="{{route('admin.principal')}}" class="brand-logo">SisAdmin</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      @if(!Auth::guest())
      <ul class="right hide-on-med-and-down">
          <li><a target="_blank" href="{{ route('site.home') }}">Site</a></li>
          <li><a href="{{ route('admin.principal') }}">Início</a></li>
          <li><a class="dropdown-button" href="#!" data-activates="dropdown1">{{ Auth::user()->name }} <i class="material-icons right">arrow_drop_down</i></a></li>
            <ul id="dropdown1" class="dropdown-content">
              <li><a href="#!" class="blue-grey-text text-darken-1">{{ Auth::user()->name }}</a></li>
              @can('usuario_listar')
              <li><a href="{{ route('admin.usuarios') }}" class="blue-grey-text text-darken-1">Usuários</a></li>
              @endcan
              @can('papel_listar')
              <li><a href="{{ route('admin.papel') }}" class="blue-grey-text text-darken-1">Papéis</a></li>
              @endcan
              @can('pagina_listar')
              <li><a href="{{ route('admin.paginas') }}" class="blue-grey-text text-darken-1">Páginas</a></li>
              @endcan
              @can('tipo_listar')
              <li><a href="{{ route('admin.tipos') }}" class="blue-grey-text text-darken-1">Tipos</a></li>
              @endcan
              @can('cidade_listar')
              <li><a href="{{ route('admin.cidades') }}" class="blue-grey-text text-darken-1">Cidades</a></li>
              @endcan
              @can('imovel_listar')
              <li><a href="{{ route('admin.imoveis') }}" class="blue-grey-text text-darken-1">Imóveis</a></li>
              @endcan
              @can('slide_listar')
              <li><a href="{{ route('admin.slides') }}" class="blue-grey-text text-darken-1">Slides</a></li>
              @endcan
              <li><a href="{{ route('admin.login.sair') }}" class="blue-grey-text text-darken-1">Sair</a></li>
            </ul>
      </ul>
      <ul class="side-nav" id="mobile-demo">
          <li><a href="#!" class="blue-grey-text text-darken-1">{{ Auth::user()->name }}</a></li>
          <li><a target="blank" href="{{route('site.home')}}" class="blue-grey-text text-darken-1">Site</a></li>
          <li><a href="{{ route('admin.principal') }}" class="blue-grey-text text-darken-1">Início</a></li>
          @can('usuario_listar')
          <li><a href="{{ route('admin.usuarios') }}" class="blue-grey-text text-darken-1">Usuários</a></li>
          @endcan
          @can('papel_listar')
          <li><a href="{{ route('admin.papel') }}" class="blue-grey-text text-darken-1">Papéis</a></li>
          @endcan
          @can('pagina_listar')
          <li><a href="{{ route('admin.paginas') }}" class="blue-grey-text text-darken-1">Páginas</a></li>
          @endcan
          @can('tipo_listar')
          <li><a href="{{ route('admin.tipos') }}" class="blue-grey-text text-darken-1">Tipos</a></li>
          @endcan
          @can('cidade_listar')
          <li><a href="{{ route('admin.cidades') }}" class="blue-grey-text text-darken-1">Cidades</a></li>
          @endcan
          @can('imovel_listar')
          <li><a href="{{ route('admin.imoveis') }}" class="blue-grey-text text-darken-1">Imóveis</a></li>
          @endcan
          @can('slide_listar')
          <li><a href="{{ route('admin.slides') }}" class="blue-grey-text text-darken-1">Slides</a></li>
          @endcan
          <li><a href="{{ route('admin.login.sair') }}" class="blue-grey-text text-darken-1">Sair</a></li>
      </ul>
      @endif
    </div>
  </div>
</nav>