<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Papel;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {
    	if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
            return redirect()->route('admin.principal');
    	}

    	$mensagem = 'Erro ao realizar login!';
        $classe = 'red white-text';

    	return redirect()->route('admin.login')
            ->with( ['mensagem' => $mensagem] )
            ->with( ['classe' => $classe] );
    }

    public function sair()
    {
        Auth::logout();

        return redirect()->route('admin.login');
    }

    public function index()
    {
        if(auth()->user()->can('usuario_listar')){
            $usuarios = User::all();

            return view('admin.usuarios.index', compact('usuarios'));
        }else{
           return $this->redirecionarHome();
        }
    }

    public function adicionar()
    {
        if(auth()->user()->can('usuario_adicionar')){
            return view('admin.usuarios.adicionar');
        }else{
           return $this->redirecionarHome();
        }
    }

    public function salvar(Request $request)
    {
        if(auth()->user()->can('usuario_adicionar')){
            $dados = $request->all();

            $usuario = new User();
            $usuario->name = $dados['name'];
            $usuario->email = $dados['email'];
            $usuario->password = bcrypt($dados['password']);
            $usuario->save();

            $mensagem = 'Registro salvo com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.usuarios')
                ->with( ['mensagem' => $mensagem] )
                ->with( ['classe' => $classe] );
        }else{
           return $this->redirecionarHome();
        }
    }

    public function editar($id)
    {
        if(auth()->user()->can('usuario_editar')){
            $usuario = User::find($id);

            return view('admin.usuarios.editar', compact('usuario'));
        }else{
           return $this->redirecionarHome();
        }
    }

    public function atualizar(Request $request, $id)
    {
        if(auth()->user()->can('usuario_editar')){
            $usuario = User::find($id);
        
            $dados = $request->all();
            if(isset($dados['password']) && strlen($dados['password'])>5){
                $dados['password'] = bcrypt($dados['password']);
            }else{
                unset($dados['password']);
            }

            $usuario->update($dados);

            $mensagem = 'Registro atualizado com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.usuarios')
                ->with( ['mensagem' => $mensagem] )
                ->with( ['classe' => $classe] );
        }else{
            return $this->redirecionarHome();   
        }
    }

    public function deletar($id)
    {
        if(auth()->user()->can('usuario_deletar')){
            User::find($id)->delete();

            $mensagem = 'Registro deletado com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.usuarios')
                ->with( ['mensagem' => $mensagem] )
                ->with( ['classe' => $classe] );
        }else{
           return $this->redirecionarHome();
        }
    }

    public function papel($id)
    {
        if(auth()->user()->can('papel_listar')){
            $usuario = User::find($id);

            $papeis = Papel::all();

            return view('admin.usuarios.papel', compact('usuario', 'papeis'));
        }else{
           return $this->redirecionarHome();
        }
    }

    public function salvarPapel(Request $request, $id)
    {
        if(auth()->user()->can('papel_adicionar')){
            $dados = $request->all();
            $papel = Papel::find($dados['papel_id']);

            $usuario = User::find($id);
            $usuario->adicionarPapel($papel);

            $papeis = Papel::all();

            $mensagem = 'Papel adicionado com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.usuarios.papel', $usuario->id)
                ->with( ['mensagem' => $mensagem] )
                ->with( ['classe' => $classe] );
        }else{
           return $this->redirecionarHome();
        }
    }

    public function deletarPapel($id, $papel_id)
    {
        if(auth()->user()->can('papel_deletar')){
            $papel = Papel::find($papel_id);

            $usuario = User::find($id);
            $usuario->deletarPapel($papel);

            $papeis = Papel::all();

            $mensagem = 'Papel deletado com sucesso!';
            $classe = 'green white-text';

            return redirect()->route('admin.usuarios.papel', $usuario->id)
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
