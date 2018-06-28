<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;

class SlideController extends Controller
{
    public function index()
    {
        if(auth()->user()->can('pagina_listar')){
    		$registros = Slide::orderBy('ordem', 'asc')->get();

            return view('admin.slides.index', compact('registros'));
        }else{
           return $this->redirecionarHome();
        }
    }

    public function adicionar()
    {
        if(auth()->user()->can('pagina_listar')){
    	   return view('admin.slides.adicionar');
        }else{
           return $this->redirecionarHome();
        }
    }

    public function salvar(Request $request)
    {
        if(auth()->user()->can('pagina_listar')){
            if(Slide::count()){
            	$slide = Slide::orderBy('ordem', 'desc')->first();
            	$ordemAtual = $slide->ordem;
            }else{
            	$ordemAtual = 0;
            }

            if($request->hasFile('imagens')){
            	$arquivos = $request->file('imagens');
            	foreach ($arquivos as $imagem) {
            		$rand = rand(11111, 99999);
    	    		$diretorio = "img/slides/";
    	    		$extensao = $imagem->guessClientExtension();
    	    		$nomeArquivo = "_img_".$rand.".".$extensao;
    	    		$imagem->move($diretorio, $nomeArquivo);

            		$registro = new Slide();
            		$registro->imagem = $diretorio."/".$nomeArquivo;
            		$registro->ordem = $ordemAtual + 1;
            		$ordemAtual++;
            		$registro->save();
            	}
            }

            $mensagem = 'Registro criado com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.slides')
                ->with( ['mensagem' => $mensagem] )
                ->with( ['classe' => $classe] );
        }else{
           return $this->redirecionarHome();
        }
    }

    public function editar($id)
    {
        if(auth()->user()->can('pagina_listar')){
            $registro = Slide::find($id);

            return view('admin.slides.editar', compact('registro'));
        }else{
           return $this->redirecionarHome();
        }
    }

    public function atualizar(Request $request, $id)
    {
        if(auth()->user()->can('pagina_listar')){
            $registro = Slide::find($id);
            
            $dados = $request->all();

            $registro->titulo = $dados['titulo'];
            $registro->descricao = $dados['descricao'];
            $registro->ordem = $dados['ordem'];
            $registro->link = $dados['link'];
            $registro->publicado = $dados['publicado'];
            
            $file = $request->file('imagem');
        	if($file){
        		$rand = rand(11111, 99999);
        		$diretorio = "img/slides/";
        		$extensao = $file->guessClientExtension();
        		$nomeArquivo = "_img_".$rand.".".$extensao;
        		$file->move($diretorio, $nomeArquivo);
        		$registro->imagem = $diretorio."/".$nomeArquivo;
        	}
            
            $registro->update();

            $mensagem = 'Registro atualizado com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.slides')
                ->with( ['mensagem' => $mensagem] )
                ->with( ['classe' => $classe] );
        }else{
           return $this->redirecionarHome();
        }
    }

    public function deletar($id)
    {
        if(auth()->user()->can('pagina_listar')){
           	Slide::find($id)->delete();

            $mensagem = 'Registro deletado com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.slides')
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
