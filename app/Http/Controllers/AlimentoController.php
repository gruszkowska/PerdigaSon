<?php

namespace App\Http\Controllers;

use App\Models\Alimento;
use App\Models\Bichinho;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class AlimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bichinho = Bichinho::where('guardiao_id', auth()->user()->id)->get();
        
        return view('alimento.create', ['bichinho' => $bichinho]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'data' => 'required',
            'descricao' => 'required',
            'pet_id' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório'
        ];

        $request->validate($rules, $feedback);

        $pet = $request->all();
        
        $id = $pet['pet_id'];

        Alimento::create($pet);

        return redirect()->route('bichinho.show', ['bichinho' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alimento  $alimento
     * @return \Illuminate\Http\Response
     */
    public function show(Alimento $alimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alimento  $alimento
     * @return \Illuminate\Http\Response
     */
    public function edit(Alimento $alimento)
    {
        return view('alimento.edit', ['alimento' => $alimento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alimento  $alimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alimento $alimento)
    {
        $rules = [
            'data' => 'required',
            'descricao' => 'required',
            'pet_id' => 'required'
        ];
        
        $regrasDinamicas = array();

        foreach($rules as $input => $regra) {
            if(array_key_exists($input, $request->all())) {
                $regrasDinamicas[$input] = $regra;
            }
        }

        $feedback = [
            'required' => 'O campo :attribute é obrigatório'
        ];

        $request->validate($regrasDinamicas, $feedback);

        $alimento->update($request->all());

        return redirect()->route('bichinho.show', $alimento->pet_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alimento  $alimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alimento $alimento)
    {
        $alimento->delete();

        return redirect()->route('bichinho.show', ['bichinho' => $alimento->pet_id]);
    }
}
