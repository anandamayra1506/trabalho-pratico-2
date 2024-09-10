<?php

namespace App\Http\Controllers;
use App\Models\Livro;

use Illuminate\Http\Request;

class LivrosController extends Controller
{
    public function showAll(){
        $lista = Livro::all();
        return view('livros.list', ['lista' => $lista]);
    }
    public function compose(){
        return view('livros.compose');
    }
    public function store(Request $request){
       Livro::create([
            'nome' => $request->nome,
            'autor' => $request->autor,
            'quantidade' => $request->quantidade,
            'preco' => $request->preco,
            'estado' => $request->estado,
            'data' => $request->data
        ]);
        $request->session()->flash('status', 'Registro inserido com sucesso!');
        return redirect('/livros');
    }
    public function edit(Request $request){
        $livro = Livro::find($request->id);
        return view('livros.compose', ['livro' => $livro]);
    }
    public function update(Request $request){
        $livro = Livro::find($request->id);
        $livro->nome = $request->nome;
        $livro->autor = $request->autor;
        $livro->quantidade = $request->quantidade;
        $livro->preco = $request->preco;
        $livro->estado = $request->estado;
        $livro->data = $request->data;
        $livro->save();
        $request->session()->flash('status', 'Registro alerado com sucesso!');
        return redirect('/livros');
    }
    public function delete(Request $request){
        $livro = Livro::find($request->id);
        $livro->delete();
        $request->session()->flash('status', 'Registro removido com sucesso!');
        return redirect('/livros');
    }
}


