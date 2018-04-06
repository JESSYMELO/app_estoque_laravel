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

     $produtos = Produto::all();

     //recebe o conteudo elemento 'descricao' do formulario
     $descricao = Input::get('descricao');

     //busca produtos com o conteudo da $descricao
     $produtos = Produto::where('descricao','like','%'.$descricao.'%')->get();


     //chama a view produto.pesquisar
     return view('produto.pesquisar')->with('produtos', $produtos);


 }

 public function mostrar_inserir(){

     return view('produto.inserir');
 }

 public function inserir(){

     //Criando um novo objeto do tipo produto
     $produto = new Produto();


     //Colocando os valores recebidos do formulário nos atributos do objeto %produto
     $produto->descricao = Input::get('descricao');
     $produto->quantidade = Input::get('quantidade');
     $produto->valor = Input::get('valor');
     $produto->data_vencimento = Input::get('data_vencimento');

     //Salvando no banco de dados
     $produto->save();

     //criando uma mensagem para o usuário
     $mensagem = "Produto inserido com sucesso";

     //Chamando a view produto.inserir e enviando a mensagem criada
     return view('produto.inserir')->with('mensagem',$mensagem);
 }

 public function mostrar_alterar($id){

     //busca no banco o registro com o id recebido
     $produto = Produto::find($id);

     //envia os dados deste registro a view produto.alterar
     return view('produto.alterar')->with('produto',$produto);
    }

 public function alterar(){

   $id = Input::get('id');
   $p = Produto::find($id);

   $p->descricao = Input::get('descricao');
   $p->quantidade = Input::get('quantidade');
   $p->valor = Input::get('valor');
   $p->data_vencimento = Input::get('data_vencimento');

   $p->save();

   $mensagem = "Produto alterado com sucesso!";
   $produtos = Produto::all();
   return view('produto.pesquisar')->with('mensagem',$mensagem)->with('produtos',$produtos);
 }

 public function excluir($id){
     //criando um objeto com o id recebido pela rota
     $produto = Produto::find($id);

     //Excluindo este objeto
     $produto->delete();

     //criando uma mensagem para ser enviada a view produto.pesquisar
     $mensagem = "Produto excluído com sucesso!";

     //capturando objetos para enviar a view produto.pesquisar
     $produtos = Produto::all();

     //retornando a view produto.pesquisar
     return view('produto.pesquisar')->with('mensagem',$mensagem)->with('produtos',$produtos);
 }
}
