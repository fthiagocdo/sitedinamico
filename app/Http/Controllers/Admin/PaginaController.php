<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pagina;

class PaginaController extends Controller
{
    public function index()
    {
        if(auth()->user()->can('pagina_listar')){
        	$paginas = Pagina::all();
        	return view('admin.paginas.index', compact('paginas'));
        }else{
           return $this->redirecionarHome();
        }
    }

    public function editar($id)
    {
        if(auth()->user()->can('pagina_editar')){
        	$pagina = Pagina::find($id);

        	return view('admin.paginas.editar', compact('pagina'));
        }else{
           return $this->redirecionarHome();
        }
    }

    public function atualizar(Request $request, $id)
    {
        if(auth()->user()->can('pagina_editar')){
        	$dados = $request->all();

        	$pagina = Pagina::find($id);
        	$pagina->titulo = $dados['titulo'];
        	$pagina->descricao = $dados['descricao'];
        	$pagina->texto = $dados['texto'];
        	if(isset($dados['email'])){
        		$pagina->email = trim($dados['email']);
        	}
        	if(isset($dados['mapa']) && trim($dados['mapa']) != ''){
        		$pagina->mapa = trim($dados['mapa']);
        	}else{
        		$pagina->mapa = null;
        	}

        	$file = $request->file('imagem');
        	if($file){
        		$rand = rand(11111, 99999);
        		$diretorio = "img/paginas/".$id."/";
        		$extensao = $file->guessClientExtension();
        		$nomeArquivo = "_img_".$rand.".".$extensao;
        		$file->move($diretorio, $nomeArquivo);
        		$pagina->imagem = $diretorio."/".$nomeArquivo;
        	}

        	$pagina->update();

        	$mensagem = 'Registro atualizado com sucesso!';
            $classe = 'green white-text';

        	return redirect()->route('admin.paginas')
                ->with( ['mensagem' => $mensagem] )
                ->with( ['classe' => $classe] );
        }else{
           return $this->redirecionarHome();
        }
    }

    public function redirecionarHome()
    {
        $mensagem = 'Sem permissão de acesso!';
        $classe = 'red white-text';

        return redirect()->route('admin.principal')
            ->with( ['mensagem' => $mensagem] )
            ->with( ['classe' => $classe] );
    }
}
