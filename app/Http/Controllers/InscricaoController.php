<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

// Importando os Models que serão utilizados nesse controller
use App\Pessoa;
use App\Cidade;
use App\Estado;
use App\Pais;
use App\CEP;
use App\Mail\SendActivationLink;

class InscricaoController extends Controller
{
  /**
   *  @route: /api/web/inscricao/new
   *
   *  @method: Post
   *  Atribbutes:
   *    Example: - attribute(type, [limits]) => description
   *    Limits:
   *      || => or;
   *      - interval.
   *
   *  @param  string  nome [5-60] => Name of Person
   *  @param  string  cpf [14] => CPF of Person
   *  @param  string  email [5-100] => Email of Person
   *  @param  string  cep [9] => ZIP Code of Person's Address
   *  @param  string  logradouro [0-100] => Address of Person's Address
   *  @param  integer numero [0-5] => number of Person's Address (nullable)
   *  @param  string  bairro [0-40] => zone of Person's Address (nullable)
   *  @param  string  cidade [7] => Cod_IBGE of the Person's City
   *  @param  string  telefone1 [11] => Phone 1 of Person
   *  @param  string  telefone2 [0 || 11] => Phone 2 of Person (nullable)
   *  @param  string  instituicao [0-100] => College of Person (nullable)
   *  @param  string  curso [0-50] => Course of Person (nullable)
   *  @param  int alunoUnivel [1] => If is AlunoUnivel of Person (nullable)
   */

  public function postNew(Request $request){

    // Faz a validação dos dados
    $this->validate($request, [
      'nome' => 'required|string|min:5|max:60',
      'cpf' => 'required|string|min:11|max:14|unique:Pessoa,Cpf',
      'email' => 'required|string|min:5|max:100|unique:Pessoa,Email',
      'cep' => 'required|string|min:8|max:9',
      'logradouro' => 'required|string|max:100',
      'numero' => 'nullable|string|max:5',
      'bairro' => 'nullable|string|max:40',
      'cidade' => 'required|integer|min:7|max:7',
      'uf' => 'required|string|min:2|max:2',
      'telefone1' => 'required|string|min:11|max:11',
      'telefone2' => 'nullable|string|min:11|max:11',
      'instituicao' => 'nullable|string|max:100',
      'curso' => 'nullable|string|max:50',
      'alunoUnivel' => 'required|int|min:1|max:1'
    ]);

      // Agora confere se a cidade informada existe
    $cidades = Cidade::find($request->input("cidade"));
    foreach($cidades as $cidade){
      $pessoa = new Pessoa;
      $pessoa->Cidade_Cod_Ibge = $request->input("cidade");
      $pessoa->Nome = $request->input("nome");
      $pessoa->Cpf = $request->input("cpf");
      $pessoa->Logradouro = $request->input("logradouro");
      $pessoa->NumEndereco = $request->input("numero");
      $pessoa->Bairro = $request->input("bairro");
      $pessoa->Cep = $request->input("cep");
      $pessoa->Fone1 = $request->input("telefone1");
      $pessoa->Fone2 = ($request->input("telefone2")) ? $request->input("telefone2") : NULL;
      $pessoa->Email = $request->input("email");
      if($request->input("alunoUnivel") == 0){
        $pessoa->Instituicao = $request->input("instituicao");
        $pessoa->Curso = $request->input("curso");
      }
      $pessoa->AlunoUnivel = $request->input("alunoUnivel");
      $pessoa->save();
      Mail::send('mail.ActivationLink', ["link" => '1'], function($message) use ($pessoa){
        $message->to($pessoa->Email, $pessoa->Nome)->subject('Welcome!');
      });
    }
  }
}
