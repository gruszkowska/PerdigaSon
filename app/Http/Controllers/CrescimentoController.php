<?php

namespace App\Http\Controllers;

use App\Models\Bichinho;
use App\Models\Crescimento;
use Illuminate\Http\Request;

class CrescimentoController extends Controller
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
        
        return view('crescimento.create', ['bichinho' => $bichinho]);
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
            'kg' => 'required',
            'g' => 'required',
            'pet_id' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório'
        ];

        $request->validate($rules, $feedback);

        $pet = $request->all();
        
        $id = $pet['pet_id'];

        Crescimento::create($pet);

        return redirect()->route('bichinho.show', ['bichinho' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crescimento  $crescimento
     * @return \Illuminate\Http\Response
     */
    public function show(Crescimento $crescimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crescimento  $crescimento
     * @return \Illuminate\Http\Response
     */
    public function edit(Crescimento $crescimento)
    {
        return view('crescimento.edit', ['crescimento' => $crescimento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crescimento  $crescimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crescimento $crescimento)
    {
        $rules = [
            'data' => 'required',
            'kg' => 'required',
            'g' => 'required',
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

        $crescimento->update($request->all());

        return redirect()->route('bichinho.show', $crescimento->pet_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crescimento  $crescimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crescimento $crescimento)
    {
        $crescimento->delete();

        return redirect()->route('bichinho.show', ['bichinho' => $crescimento->pet_id]);
    }
}
