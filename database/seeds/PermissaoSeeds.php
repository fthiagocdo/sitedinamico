<?php

use Illuminate\Database\Seeder;
use App\Permissao;

class PermissaoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Permissao::where('nome', '=', 'usuario_listar')->count()){
        	Permissao::create([
        		'nome'=>'usuario_listar',
        		'descricao'=>'Listar Usuários'
        	]);
        }else{
        	$permissao = Permissao::where('nome', '=', 'usuario_listar')->first();
        	$permissao->update([
        		'nome'=>'usuario_listar',
        		'descricao'=>'Listar Usuários'
        	]);
        }
        if(!Permissao::where('nome', '=', 'usuario_adicionar')->count()){
        	Permissao::create([
        		'nome'=>'usuario_adicionar',
        		'descricao'=>'Adicionar Usuários'
        	]);
        }else{
        	$permissao = Permissao::where('nome', '=', 'usuario_adicionar')->first();
        	$permissao->update([
        		'nome'=>'usuario_adicionar',
        		'descricao'=>'Adicionar Usuários'
        	]);
        }
        if(!Permissao::where('nome', '=', 'usuario_editar')->count()){
        	Permissao::create([
        		'nome'=>'usuario_editar',
        		'descricao'=>'Editar Usuários'
        	]);
        }else{
        	$permissao = Permissao::where('nome', '=', 'usuario_editar')->first();
        	$permissao->update([
        		'nome'=>'usuario_editar',
        		'descricao'=>'Editar Usuários'
        	]);
        }
        if(!Permissao::where('nome', '=', 'usuario_deletar')->count()){
        	Permissao::create([
        		'nome'=>'usuario_deletar',
        		'descricao'=>'Deletar Usuários'
        	]);
        }else{
        	$permissao = Permissao::where('nome', '=', 'usuario_deletar')->first();
        	$permissao->update([
        		'nome'=>'usuario_deletar',
        		'descricao'=>'Deletar Usuários'
        	]);
        }

        if(!Permissao::where('nome', '=', 'papel_listar')->count()){
            Permissao::create([
                'nome'=>'papel_listar',
                'descricao'=>'Listar Papéis'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'papel_listar')->first();
            $permissao->update([
                'nome'=>'papel_listar',
                'descricao'=>'Listar Papéis'
            ]);
        }
        if(!Permissao::where('nome', '=', 'papel_adicionar')->count()){
            Permissao::create([
                'nome'=>'papel_adicionar',
                'descricao'=>'Adicionar Papéis'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'papel_adicionar')->first();
            $permissao->update([
                'nome'=>'papel_adicionar',
                'descricao'=>'Adicionar Papéis'
            ]);
        }
        if(!Permissao::where('nome', '=', 'papel_editar')->count()){
            Permissao::create([
                'nome'=>'papel_editar',
                'descricao'=>'Editar Papéis'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'papel_editar')->first();
            $permissao->update([
                'nome'=>'papel_editar',
                'descricao'=>'Editar Papéis'
            ]);
        }
        if(!Permissao::where('nome', '=', 'papel_deletar')->count()){
            Permissao::create([
                'nome'=>'papel_deletar',
                'descricao'=>'Deletar Papéis'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'papel_deletar')->first();
            $permissao->update([
                'nome'=>'papel_deletar',
                'descricao'=>'Deletar Papéis'
            ]);
        }

        if(!Permissao::where('nome', '=', 'pagina_listar')->count()){
            Permissao::create([
                'nome'=>'pagina_listar',
                'descricao'=>'Listar Páginas'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'pagina_listar')->first();
            $permissao->update([
                'nome'=>'pagina_listar',
                'descricao'=>'Listar Páginas'
            ]);
        }
        if(!Permissao::where('nome', '=', 'pagina_adicionar')->count()){
            Permissao::create([
                'nome'=>'pagina_adicionar',
                'descricao'=>'Adicionar Páginas'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'pagina_adicionar')->first();
            $permissao->update([
                'nome'=>'pagina_adicionar',
                'descricao'=>'Adicionar Páginas'
            ]);
        }
        if(!Permissao::where('nome', '=', 'pagina_editar')->count()){
            Permissao::create([
                'nome'=>'pagina_editar',
                'descricao'=>'Editar Páginas'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'pagina_editar')->first();
            $permissao->update([
                'nome'=>'pagina_editar',
                'descricao'=>'Editar Páginas'
            ]);
        }
        if(!Permissao::where('nome', '=', 'pagina_deletar')->count()){
            Permissao::create([
                'nome'=>'pagina_deletar',
                'descricao'=>'Deletar Páginas'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'pagina_deletar')->first();
            $permissao->update([
                'nome'=>'pagina_deletar',
                'descricao'=>'Deletar Páginas'
            ]);
        }

        if(!Permissao::where('nome', '=', 'tipo_listar')->count()){
            Permissao::create([
                'nome'=>'tipo_listar',
                'descricao'=>'Listar Tipos'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'tipo_listar')->first();
            $permissao->update([
                'nome'=>'tipo_listar',
                'descricao'=>'Listar Tipos'
            ]);
        }
        if(!Permissao::where('nome', '=', 'tipo_adicionar')->count()){
            Permissao::create([
                'nome'=>'tipo_adicionar',
                'descricao'=>'Adicionar Tipos'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'tipo_adicionar')->first();
            $permissao->update([
                'nome'=>'tipo_adicionar',
                'descricao'=>'Adicionar Tipos'
            ]);
        }
        if(!Permissao::where('nome', '=', 'tipo_editar')->count()){
            Permissao::create([
                'nome'=>'tipo_editar',
                'descricao'=>'Editar Tipos'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'tipo_editar')->first();
            $permissao->update([
                'nome'=>'tipo_editar',
                'descricao'=>'Editar Tipos'
            ]);
        }
        if(!Permissao::where('nome', '=', 'tipo_deletar')->count()){
            Permissao::create([
                'nome'=>'tipo_deletar',
                'descricao'=>'Deletar Tipos'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'tipo_deletar')->first();
            $permissao->update([
                'nome'=>'tipo_deletar',
                'descricao'=>'Deletar Tipos'
            ]);
        }

        if(!Permissao::where('nome', '=', 'cidade_listar')->count()){
            Permissao::create([
                'nome'=>'cidade_listar',
                'descricao'=>'Listar Cidades'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'cidade_listar')->first();
            $permissao->update([
                'nome'=>'cidade_listar',
                'descricao'=>'Listar Cidades'
            ]);
        }
        if(!Permissao::where('nome', '=', 'cidade_adicionar')->count()){
            Permissao::create([
                'nome'=>'cidade_adicionar',
                'descricao'=>'Adicionar Cidades'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'cidade_adicionar')->first();
            $permissao->update([
                'nome'=>'cidade_adicionar',
                'descricao'=>'Adicionar Cidades'
            ]);
        }
        if(!Permissao::where('nome', '=', 'cidade_editar')->count()){
            Permissao::create([
                'nome'=>'cidade_editar',
                'descricao'=>'Editar Cidades'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'cidade_editar')->first();
            $permissao->update([
                'nome'=>'cidade_editar',
                'descricao'=>'Editar Cidades'
            ]);
        }
        if(!Permissao::where('nome', '=', 'cidade_deletar')->count()){
            Permissao::create([
                'nome'=>'cidade_deletar',
                'descricao'=>'Deletar Cidades'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'cidade_deletar')->first();
            $permissao->update([
                'nome'=>'cidade_deletar',
                'descricao'=>'Deletar Cidades'
            ]);
        }

        if(!Permissao::where('nome', '=', 'imovel_listar')->count()){
            Permissao::create([
                'nome'=>'imovel_listar',
                'descricao'=>'Listar Imóveis'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'imovel_listar')->first();
            $permissao->update([
                'nome'=>'imovel_listar',
                'descricao'=>'Listar Imóveis'
            ]);
        }
        if(!Permissao::where('nome', '=', 'imovel_adicionar')->count()){
            Permissao::create([
                'nome'=>'imovel_adicionar',
                'descricao'=>'Adicionar Imóveis'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'imovel_adicionar')->first();
            $permissao->update([
                'nome'=>'imovel_adicionar',
                'descricao'=>'Adicionar Imóveis'
            ]);
        }
        if(!Permissao::where('nome', '=', 'imovel_editar')->count()){
            Permissao::create([
                'nome'=>'imovel_editar',
                'descricao'=>'Editar Imóveis'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'imovel_editar')->first();
            $permissao->update([
                'nome'=>'imovel_editar',
                'descricao'=>'Editar Imóveis'
            ]);
        }
        if(!Permissao::where('nome', '=', 'imovel_deletar')->count()){
            Permissao::create([
                'nome'=>'imovel_deletar',
                'descricao'=>'Deletar Imóveis'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'imovel_deletar')->first();
            $permissao->update([
                'nome'=>'imovel_deletar',
                'descricao'=>'Deletar Imóveis'
            ]);
        }

        if(!Permissao::where('nome', '=', 'slide_listar')->count()){
            Permissao::create([
                'nome'=>'slide_listar',
                'descricao'=>'Listar Slides'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'slide_listar')->first();
            $permissao->update([
                'nome'=>'slide_listar',
                'descricao'=>'Listar Slides'
            ]);
        }
        if(!Permissao::where('nome', '=', 'slide_adicionar')->count()){
            Permissao::create([
                'nome'=>'slide_adicionar',
                'descricao'=>'Adicionar Slides'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'slide_adicionar')->first();
            $permissao->update([
                'nome'=>'slide_adicionar',
                'descricao'=>'Adicionar Slides'
            ]);
        }
        if(!Permissao::where('nome', '=', 'slide_editar')->count()){
            Permissao::create([
                'nome'=>'slide_editar',
                'descricao'=>'Editar Slides'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'slide_editar')->first();
            $permissao->update([
                'nome'=>'slide_editar',
                'descricao'=>'Editar Slides'
            ]);
        }
        if(!Permissao::where('nome', '=', 'slide_deletar')->count()){
            Permissao::create([
                'nome'=>'slide_deletar',
                'descricao'=>'Deletar Slides'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'slide_deletar')->first();
            $permissao->update([
                'nome'=>'slide_deletar',
                'descricao'=>'Deletar Slides'
            ]);
        }

        if(!Permissao::where('nome', '=', 'permissao_listar')->count()){
            Permissao::create([
                'nome'=>'permissao_listar',
                'descricao'=>'Listar Permissão'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'permissao_listar')->first();
            $permissao->update([
                'nome'=>'permissao_listar',
                'descricao'=>'Listar Permissão'
            ]);
        }
        if(!Permissao::where('nome', '=', 'permissao_adicionar')->count()){
            Permissao::create([
                'nome'=>'permissao_adicionar',
                'descricao'=>'Adicionar Permissão'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'permissao_adicionar')->first();
            $permissao->update([
                'nome'=>'permissao_adicionar',
                'descricao'=>'Adicionar Permissão'
            ]);
        }
        if(!Permissao::where('nome', '=', 'permissao_editar')->count()){
            Permissao::create([
                'nome'=>'permissao_editar',
                'descricao'=>'Editar Permissão'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'permissao_editar')->first();
            $permissao->update([
                'nome'=>'permissao_editar',
                'descricao'=>'Editar Permissão'
            ]);
        }
        if(!Permissao::where('nome', '=', 'permissao_deletar')->count()){
            Permissao::create([
                'nome'=>'permissao_deletar',
                'descricao'=>'Deletar Permissão'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'permissao_deletar')->first();
            $permissao->update([
                'nome'=>'papel_deletar',
                'descricao'=>'Deletar Permissão'
            ]);
        }

        if(!Permissao::where('nome', '=', 'galeria_listar')->count()){
            Permissao::create([
                'nome'=>'galeria_listar',
                'descricao'=>'Listar Galeria'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'galeria_listar')->first();
            $permissao->update([
                'nome'=>'galeria_listar',
                'descricao'=>'Listar Galeria'
            ]);
        }
        if(!Permissao::where('nome', '=', 'galeria_adicionar')->count()){
            Permissao::create([
                'nome'=>'galeria_adicionar',
                'descricao'=>'Adicionar Galeria'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'galeria_adicionar')->first();
            $permissao->update([
                'nome'=>'galeria_adicionar',
                'descricao'=>'Adicionar Galeria'
            ]);
        }
        if(!Permissao::where('nome', '=', 'galeria_editar')->count()){
            Permissao::create([
                'nome'=>'galeria_editar',
                'descricao'=>'Editar Galeria'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'galeria_editar')->first();
            $permissao->update([
                'nome'=>'galeria_editar',
                'descricao'=>'Editar Galeria'
            ]);
        }
        if(!Permissao::where('nome', '=', 'galeria_deletar')->count()){
            Permissao::create([
                'nome'=>'galeria_deletar',
                'descricao'=>'Deletar Galeria'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'galeria_deletar')->first();
            $permissao->update([
                'nome'=>'galeria_deletar',
                'descricao'=>'Deletar Galeria'
            ]);
        }
    }
}
