<?php

namespace App\Http\Controllers;

use App\Models\Bichinho;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
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
        
        return view('medicamento.create', ['bichinho' => $bichinho]);
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
            'data_inicio' => 'required',
            'data_final' => '',
            'medicamento' => 'required',
            'check' => '',
            'pet_id' => 'required',
            'dosagem' => 'required',
            'medida' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório'
        ];

        $request->validate($rules, $feedback);

        $pet = $request->all();
        
        $id = $pet['pet_id'];

        Medicamento::create($pet);

        return redirect()->route('bichinho.show', ['bichinho' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function show(Medicamento $medicamento)
    {
        if($medicamento->check == 0) {
            $medicamento['check'] = 1;
        }
        else if($medicamento->check == 1) {
            $medicamento['check'] = 0;
        }

        $medicamento->save();

        return redirect()->route('bichinho.show', ['bichinho' => $medicamento->pet_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicamento $medicamento)
    {
        return view('medicamento.edit', ['medicamento' => $medicamento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicamento $medicamento)
    {
        $rules = [
            'data_inicio' => 'required',
            'data_final' => '',
            'medicamento' => 'required',
            'check' => '',
            'pet_id' => 'required',
            'dosagem' => 'required',
            'medida' => 'required'
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

        $medicamento->update($request->all());

        return redirect()->route('bichinho.show', $medicamento->pet_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicamento $medicamento)
    {
        $medicamento->delete();

        return redirect()->route('bichinho.show', ['bichinho' => $medicamento->pet_id]);
    }
}
