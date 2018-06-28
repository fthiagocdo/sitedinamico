<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Papel;
use App\Permissao;

class PapelController extends Controller
{
    public function index(){
        if(auth()->user()->can('papel_listar')){
            $registros = Papel::all();

            return view('admin.papel.index', compact('registros'));
        }else{
           return $this->redirecionarHome();
        }
    }

    public function adicionar()
    {
        if(auth()->user()->can('papel_adicionar')){
            return view('admin.papel.adicionar');
        }else{
           return $this->redirecionarHome();
        }
    }

    public function salvar(Request $request)
    {
        if(auth()->user()->can('papel_adicionar')){
            $dados = $request->all();

            $registro = new Papel();
            $registro->nome = $dados['nome'];
            $registro->descricao = $dados['descricao'];
            $registro->save();

            $mensagem = 'Registro criado com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.papel')
                ->with( ['mensagem' => $mensagem] )
                ->with( ['classe' => $classe] );
        }else{
           return $this->redirecionarHome();
        }
    }

    public function editar($id)
    {
        if(auth()->user()->can('papel_editar')){
        	if(Papel::find($id)->nome == 'admin'){
                $mensagem = 'Registro não pode ser alterado!';
                $classe = 'red white-text';

                return redirect()->route('admin.papel')
                    ->with( ['mensagem' => $mensagem] )
                    ->with( ['classe' => $classe] );
            }else{
    	        $registro = Papel::find($id);

    	        return view('admin.papel.editar', compact('registro'));
    	    }
        }else{
           return $this->redirecionarHome();
        }
    }

    public function atualizar(Request $request, $id)
    {
        if(auth()->user()->can('papel_editar')){
            if(Papel::find($id)->nome == 'admin'){
            	$mensagem = 'Registro não pode ser alterado!';
                $classe = 'red white-text';

                return redirect()->route('admin.papel')
                    ->with( ['mensagem' => $mensagem] )
                    ->with( ['classe' => $classe] );
            }else{
    	        $registro = Papel::find($id);
    	        
    	        $dados = $request->all();

    	        $registro->nome = $dados['nome'];
    	        $registro->descricao = $dados['descricao'];
    	        $registro->update();

    	        $mensagem = 'Registro atualizado com sucesso!';
                $classe = 'green white-text';

                return redirect()->route('admin.papel')
                    ->with( ['mensagem' => $mensagem] )
                    ->with( ['classe' => $classe] );
    	    }
        }else{
           return $this->redirecionarHome();
        }
    }

    public function deletar($id)
    {
        if(auth()->user()->can('papel_deletar')){
        	if(Papel::find($id)->nome == 'admin'){
            	$mensagem = 'Registro não pode ser alterado!';
                $classe = 'red white-text';

                return redirect()->route('admin.papel')
                    ->with( ['mensagem' => $mensagem] )
                    ->with( ['classe' => $classe] );
            }else{
                Papel::find($id)->delete();

                $mensagem = 'Registro deletado com sucesso!';
                $classe = 'green white-text';

                return redirect()->route('admin.papel')
                    ->with( ['mensagem' => $mensagem] )
                    ->with( ['classe' => $classe] );
            }
        }else{
           return $this->redirecionarHome();
        }
    }

    public function permissao($id)
    {
        if(auth()->user()->can('permissao_listar')){
            $papel = Papel::find($id);
            $permissoes = Permissao::all();

            return view('admin.papel.permissao', compact('papel', 'permissoes'));
        }else{
           return $this->redirecionarHome();
        }
    }

    public function salvarPermissao(Request $request, $id)
    {
        if(auth()->user()->can('permissao_adicionar')){
            $permissao = Permissao::find($request['permissao_id']);

            $papel = Papel::find($id);
            $papel->adicionarPermissao($permissao);

            $permissoes = Permissao::all();

            $mensagem = 'Permissão adicionada com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.papel.permissao', $papel->id)
                ->with( ['mensagem' => $mensagem] )
                ->with( ['classe' => $classe] );
        }else{
           return $this->redirecionarHome();
        }
    }

    public function deletarPermissao($id, $permissao_id)
    {
        if(auth()->user()->can('permissao_deletar')){
            $permissao = Permissao::find($permissao_id);

            $papel = Papel::find($id);
            $papel->deletarPermissao($permissao);

            $permissoes = Permissao::all();

            $mensagem = 'Permissão deletada com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.papel.permissao', $papel->id)
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
