<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cidade;
use App\Imovel;

class CidadeController extends Controller
{
    public function index()
    {
        if(auth()->user()->can('cidade_listar')){
            $registros = Cidade::all();

            return view('admin.cidades.index', compact('registros'));
        }else{
           return $this->redirecionarHome();
        }
    }

    public function adicionar()
    {
        if(auth()->user()->can('cidade_adicionar')){
            return view('admin.cidades.adicionar');
        }else{
           return $this->redirecionarHome();
        }
    }

    public function salvar(Request $request)
    {
        if(auth()->user()->can('cidade_adicionar')){
            $dados = $request->all();

            $registro = new Cidade();
            $registro->nome = $dados['nome'];
            $registro->estado = $dados['estado'];
            $registro->sigla_estado = $dados['sigla_estado'];
            $registro->save();

            $mensagem = 'Registro criado com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.cidades')
                ->with( ['mensagem' => $mensagem] )
                ->with( ['classe' => $classe] );
        }else{
           return $this->redirecionarHome();
        }
    }

    public function editar($id)
    {
        if(auth()->user()->can('cidade_editar')){
            $registro = Cidade::find($id);

            return view('admin.cidades.editar', compact('registro'));
        }else{
           return $this->redirecionarHome();
        }
    }

    public function atualizar(Request $request, $id)
    {
        if(auth()->user()->can('cidade_editar')){
            $registro = Cidade::find($id);
            
            $dados = $request->all();

            $registro->nome = $dados['nome'];
            $registro->estado = $dados['estado'];
            $registro->sigla_estado = $dados['sigla_estado'];
            $registro->update();

            $mensagem = 'Registro atualizado com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.cidades')
                ->with( ['mensagem' => $mensagem] )
                ->with( ['classe' => $classe] );
        }else{
           return $this->redirecionarHome();
        }
    }

    public function deletar($id)
    {
        if(auth()->user()->can('cidade_deletar')){
            if(Imovel::where('cidade_id', '=', $id)->count()){
                $mensagem = 'Não é possível deletar o registro!';
                $classe = 'red white-text';

                return redirect()->route('admin.cidades')
                    ->with( ['mensagem' => $mensagem] )
                    ->with( ['classe' => $classe] );
            }else{
                Cidade::find($id)->delete();

                $mensagem = 'Registro deletado com sucesso!';
                $classe = 'green white-text';

                return redirect()->route('admin.cidades')
                    ->with( ['mensagem' => $mensagem] )
                    ->with( ['classe' => $classe] );
            }
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
