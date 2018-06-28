<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Galeria;
use App\Imovel;

class GaleriaController extends Controller
{
    public function index($id)
    {
        if(auth()->user()->can('galeria_listar')){
            $imovel = Imovel::find($id);

            $registros = $imovel->galeria()->orderBy('ordem', 'asc')->get();

            return view('admin.galerias.index', compact('registros', 'imovel'));
        }else{
           return $this->redirecionarHome();
        }
    }

    public function adicionar($id)
    {
        if(auth()->user()->can('galeria_adicionar')){
        	$imovel = Imovel::find($id);

            return view('admin.galerias.adicionar', compact('imovel'));
        }else{
           return $this->redirecionarHome();
        }
    }

    public function salvar(Request $request, $id)
    {
        if(auth()->user()->can('galeria_adicionar')){
            $dados = $request->all();

            $imovel = Imovel::find($id);

            if($imovel->galeria()->count()){
            	$galeria = $imovel->galeria()->orderBy('ordem', 'desc')->first();
            	$ordemAtual = $galeria->ordem;
            }else{
            	$ordemAtual = 0;
            }

            if($request->hasFile('imagens')){
            	$arquivos = $request->file('imagens');
            	foreach ($arquivos as $imagem) {
            		$rand = rand(11111, 99999);
    	    		$diretorio = "img/imoveis/".str_slug($imovel->titulo, '_')."/";
    	    		$extensao = $imagem->guessClientExtension();
    	    		$nomeArquivo = "_img_".$rand.".".$extensao;
    	    		$imagem->move($diretorio, $nomeArquivo);

            		$registro = new Galeria();
            		$registro->imovel_id = $imovel->id;
            		$registro->imagem = $diretorio."/".$nomeArquivo;
            		$registro->ordem = $ordemAtual + 1;
            		$ordemAtual++;
            		$registro->save();
            	}
            }

            $mensagem = 'Registros criado com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.galerias', $imovel->id)
                ->with( ['mensagem' => $mensagem] )
                ->with( ['classe' => $classe] );
        }else{
           return $this->redirecionarHome();
        }
    }

    public function editar($id)
    {
        if(auth()->user()->can('galeria_editar')){
            $registro = Galeria::find($id);

            $imovel = $registro->imovel;

            return view('admin.galerias.editar', compact('registro', 'imovel'));
        }else{
           return $this->redirecionarHome();
        }
    }

    public function atualizar(Request $request, $id)
    {
        if(auth()->user()->can('galeria_editar')){
            $registro = Galeria::find($id);

            $imovel = $registro->imovel;
            
            $dados = $request->all();

            $registro->titulo = $dados['titulo'];
            $registro->descricao = $dados['descricao'];
            $registro->ordem = $dados['ordem'];
            
            $file = $request->file('imagem');
        	if($file){
        		$rand = rand(11111, 99999);
        		$diretorio = "img/imoveis/".str_slug($imovel->titulo, '_')."/";
        		$extensao = $file->guessClientExtension();
        		$nomeArquivo = "_img_".$rand.".".$extensao;
        		$file->move($diretorio, $nomeArquivo);
        		$registro->imagem = $diretorio."/".$nomeArquivo;
        	}
            
            $registro->update();

            $mensagem = 'Registro atualizado com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.galerias', $imovel->id)
                ->with( ['mensagem' => $mensagem] )
                ->with( ['classe' => $classe] );
        }else{
           return $this->redirecionarHome();
        }
    }

    public function deletar($id)
    {
        if(auth()->user()->can('galeria_deletar')){
            $galeria = Galeria::find($id);

            $imovel = $galeria->imovel;

            $galeria->delete();

            $mensagem = 'Registro deletado com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.galerias', $imovel->id)
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
