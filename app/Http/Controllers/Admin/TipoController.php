<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tipo;
use App\Imovel;

class TipoController extends Controller
{
    public function index()
    {
        if(auth()->user()->can('tipo_listar')){
            $registros = Tipo::all();

            return view('admin.tipos.index', compact('registros'));
        }else{
           return $this->redirecionarHome();
        }
    }

    public function adicionar()
    {
        if(auth()->user()->can('tipo_adicionar')){
            return view('admin.tipos.adicionar');
        }else{
           return $this->redirecionarHome();
        }
    }

    public function salvar(Request $request)
    {
        if(auth()->user()->can('tipo_adicionar')){
            $dados = $request->all();

            $registro = new Tipo();
            $registro->titulo = $dados['titulo'];
            $registro->save();

            $mensagem = 'Registro criado com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.tipos')
                ->with( ['mensagem' => $mensagem] )
                ->with( ['classe' => $classe] );
        }else{
           return $this->redirecionarHome();
        }
    }

    public function editar($id)
    {
        if(auth()->user()->can('tipo_editar')){
            $registro = Tipo::find($id);

            return view('admin.tipos.editar', compact('registro'));
        }else{
           return $this->redirecionarHome();
        }
    }

    public function atualizar(Request $request, $id)
    {
        if(auth()->user()->can('tipo_editar')){
            $registro = Tipo::find($id);
            
            $dados = $request->all();

            $registro->titulo = $dados['titulo'];
            $registro->update();

            $mensagem = 'Registro atualizado com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.tipos')
                ->with( ['mensagem' => $mensagem] )
                ->with( ['classe' => $classe] );
        }else{
           return $this->redirecionarHome();
        }
    }

    public function deletar($id)
    {
        if(auth()->user()->can('tipo_deletar')){
            if(Imovel::where('tipo_id', '=', $id)->count()){
                $mensagem = 'Não é possível deletar o registro!';
                $classe = 'red white-text';

                return redirect()->route('admin.tipos')
                    ->with( ['mensagem' => $mensagem] )
                    ->with( ['classe' => $classe] );
            }else{
                Tipo::find($id)->delete();

                $mensagem = 'Registro deletado com sucesso!';
                $classe = 'green white-text';

                return redirect()->route('admin.tipos')
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
