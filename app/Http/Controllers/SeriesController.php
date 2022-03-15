<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SeriesFormRequest;

use App\Serie;

class SeriesController extends Controller
{
    //retorna uma lista das séries
    public function listarSeries(Request $request) 
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');

        return view('series.listarSeries', [
            'series' => $series, 
            'mensagem' => $mensagem
        ]);
    }

    //retorna a tela de adicionar uma série
    public function criarSeries(Request $request) 
    {
        return view('series.criarSeries');
    }

    //insere uma série no banco
    public function salvarSeries(SeriesFormRequest $request)
    {   
        $serie = Serie::create($request->all());
        
        $request->session()->flash('mensagem', "A série {$serie->nome} foi criada com sucesso!");

        return redirect('/series');
    }

    //remove uma série no banco
    public function removerSeries(Request $request)
    {
        $serie = Serie::destroy($request->id);

        $request->session()->flash('mensagem', "Série removida com sucesso!");

        return redirect('/series');
    }
}