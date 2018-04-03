<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProdutoController extends Controller
{
 public function pesquisar()
{

        //busca todos os produtos do banco de dados
        //$produtos = Produto::all();

        //recebe o conteudo elemento 'descricao' do formulario
        $descricao = Input::get('descricao');

        //busca produtos com o conteudo da $descricao
        $produtos = Produto::where('descricao','like', '%'.$descricao.'%')->get();


        //chama a view produto.pesquisar
        return view('produto.pesquisar')->with ('produtos',$produtos);

}
}
