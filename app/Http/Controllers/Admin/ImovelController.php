<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imovel;
use App\Tipo;
use App\Cidade;

class ImovelController extends Controller
{
    public function index()
    {
        if(auth()->user()->can('imovel_listar')){
            $registros = Imovel::all();

            return view('admin.imoveis.index', compact('registros'));
        }else{
           return $this->redirecionarHome();
        }
    }

    public function adicionar()
    {
        if(auth()->user()->can('imovel_adicionar')){
        	$tipos = Tipo::all();
        	$cidades = Cidade::all();

            return view('admin.imoveis.adicionar', compact('tipos', 'cidades'));
        }else{
           return $this->redirecionarHome();
        }
    }

    public function salvar(Request $request)
    {
        if(auth()->user()->can('imovel_adicionar')){
            $dados = $request->all();

            $registro = new Imovel();
            $registro->titulo = $dados['titulo'];
            $registro->descricao = $dados['descricao'];
            $registro->status = $dados['status'];
            $registro->endereco = $dados['endereco'];
            $registro->cep = $dados['cep'];
            $registro->valor = $dados['valor'];
            $registro->dormitorios = $dados['dormitorios'];
            $registro->detalhes = $dados['detalhes'];
            $registro->visualizacoes = 0;
            $registro->publicar = $dados['publicar'];
            $registro->cidade_id = $dados['cidade_id'];
            $registro->tipo_id = $dados['tipo_id'];

            if(isset($dados['mapa']) && trim($dados['mapa'] != "")){
            	$registro->mapa = $dados['mapa'];
            }else{
            	$registro->mapa = null;
            }

            $file = $request->file('imagem');
        	if($file){
        		$rand = rand(11111, 99999);
        		$diretorio = "img/imoveis/".str_slug($dados['titulo'], '_')."/";
        		$extensao = $file->guessClientExtension();
        		$nomeArquivo = "_img_".$rand.".".$extensao;
        		$file->move($diretorio, $nomeArquivo);
        		$registro->imagem = $diretorio."/".$nomeArquivo;
        	}
            
            $registro->save();

            $mensagem = 'Registro criado com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.imoveis')
                ->with( ['mensagem' => $mensagem] )
                ->with( ['classe' => $classe] );
        }else{
           return $this->redirecionarHome();
        }
    }

    public function editar($id)
    {
        if(auth()->user()->can('imovel_editar')){
            $registro = Imovel::find($id);
            $tipos = Tipo::all();
        	$cidades = Cidade::all();

            return view('admin.imoveis.editar', compact('registro', 'tipos', 'cidades'));
        }else{
           return $this->redirecionarHome();
        }
    }

    public function atualizar(Request $request, $id)
    {
        if(auth()->user()->can('imovel_editar')){
            $registro = Imovel::find($id);
            
            $dados = $request->all();

            $registro->titulo = $dados['titulo'];
            $registro->descricao = $dados['descricao'];
            $registro->status = $dados['status'];
            $registro->endereco = $dados['endereco'];
            $registro->cep = $dados['cep'];
            $registro->valor = $dados['valor'];
            $registro->dormitorios = $dados['dormitorios'];
            $registro->detalhes = $dados['detalhes'];
            $registro->publicar = $dados['publicar'];
            $registro->cidade_id = $dados['cidade_id'];
            $registro->tipo_id = $dados['tipo_id'];

            if(isset($dados['mapa']) && trim($dados['mapa'] != "")){
            	$registro->mapa = $dados['mapa'];
            }else{
            	$registro->mapa = null;
            }

            $file = $request->file('imagem');
        	if($file){
        		$rand = rand(11111, 99999);
        		$diretorio = "img/imoveis/".str_slug($dados['titulo'], '_')."/";
        		$extensao = $file->guessClientExtension();
        		$nomeArquivo = "_img_".$rand.".".$extensao;
        		$file->move($diretorio, $nomeArquivo);
        		$registro->imagem = $diretorio."/".$nomeArquivo;
        	}
            
            $registro->update();

            $mensagem = 'Registro atualizado com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.imoveis')
                ->with( ['mensagem' => $mensagem] )
                ->with( ['classe' => $classe] );
        }else{
           return $this->redirecionarHome();
        }
    }

    public function deletar($id)
    {
        if(auth()->user()->can('imovel_deletar')){
            Imovel::find($id)->delete();

            $mensagem = 'Registro deletado com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.imoveis')
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
