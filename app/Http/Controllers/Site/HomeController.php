<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imovel;
use App\Slide;
use App\Tipo;
use App\Cidade;

class HomeController extends Controller
{
    public function index(){
    	$imoveis = Imovel::where('publicar', '=', 'sim')->orderBy('id', 'desc')->paginate(5);

    	$slides = Slide::orderBy('ordem')->get();
    	
    	$direcaoImagem = ['center-align', 'left-align', 'right-align'];

    	$tipos = Tipo::orderBy('titulo')->get();

    	$cidades = Cidade::orderBy('nome')->get();

    	return view('site.home', compact('imoveis', 'slides', 'direcaoImagem', 'tipos', 'cidades'));
    }

    public function busca(Request $request){
    	$busca = $request->all();

    	$tipos = Tipo::orderBy('titulo')->get();

    	$cidades = Cidade::orderBy('nome')->get();

    	if($busca['status'] == '0'){
    		$testeStatus = [
    			['status', '<>', null]
    		];
    	}else{
    		$testeStatus = [
    			['status', '=', $busca['status']]
    		];
    	}

    	if($busca['tipo_id'] == '0'){
    		$testeTipo = [
    			['tipo_id', '<>', null]
    		];
    	}else{
    		$testeTipo = [
    			['tipo_id', '=', $busca['tipo_id']]
    		];
    	}

    	if($busca['cidade_id'] == '0'){
    		$testeCidade = [
    			['cidade_id', '<>', null]
    		];
    	}else{
    		$testeCidade = [
    			['cidade_id', '=', $busca['cidade_id']]
    		];
    	}

    	if($busca['dormitorios'] == '0'){
    		$testeDormitorios = [
    			['dormitorios', '>', '0']
    		];
    	}else if($busca['dormitorios'] == '4'){
    		$testeDormitorios = [
    			['dormitorios', '>=', '4']
    		];
    	}else{
    		$testeDormitorios = [
    			['dormitorios', '=', $busca['dormitorios']]
    		];
    	}

    	if($busca['valor'] == '0'){
    		$testeValor = [
    			['valor', '>', '0']
    		];
    	}else if($busca['valor'] == '1'){
    		$testeValor = [
    			['valor', '<=', '500']
    		];
    	}else if($busca['valor'] == '2'){
    		$testeValor = [
    			['valor', '>', '500'],
    			['valor', '<=', '1000']
    		];
    	}else if($busca['valor'] == '3'){
    		$testeValor = [
    			['valor', '>', '1000'],
    			['valor', '<=', '5000']
    		];
    	}else if($busca['valor'] == '4'){
    		$testeValor = [
    			['valor', '>', '5000'],
    			['valor', '<=', '10000']
    		];
    	}else if($busca['valor'] == '5'){
    		$testeValor = [
    			['valor', '>', '10000'],
    			['valor', '<=', '50000']
    		];
    	}else if($busca['valor'] == '6'){
    		$testeValor = [
    			['valor', '>', '50000'],
    			['valor', '<=', '100000']
    		];
    	}else if($busca['valor'] == '7'){
    		$testeValor = [
    			['valor', '>', '100000'],
    			['valor', '<=', '200000']
    		];
    	}else if($busca['valor'] == '8'){
    		$testeValor = [
    			['valor', '>', '20000'],
    			['valor', '<=', '500000']
    		];
    	}else{
    		$testeValor = [
    			['valor', '>', '500000']
    		];
    	}

    	if($busca['bairro'] == ''){
    		$testeBairro = [
    			['endereco', '<>', null]
    		];
    	}else{
    		$testeBairro = [
    			['endereco', 'like', '%'.$busca['bairro'].'%']
    		];
    	}

    	$imoveis = Imovel::where('publicar', '=', 'sim')
    	->where($testeStatus)
    	->where($testeTipo)
    	->where($testeCidade)
    	->where($testeDormitorios)
    	->where($testeValor)
    	->where($testeBairro)
    	->orderBy('id', 'desc')->paginate(5);

    	return view('site.busca', compact('busca', 'imoveis', 'tipos', 'cidades'));
    }
}
