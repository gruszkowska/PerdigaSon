<?php

namespace App\Http\Controllers;

use App\Models\Bichinho;
use App\Models\Vacina;
use Illuminate\Http\Request;

class VacinaController extends Controller
{
    public function __construct(Vacina $vacina)
    {
        $this->vacina = $vacina;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Integer
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bichinho = Bichinho::where('guardiao_id', auth()->user()->id)->get();
        
        return view('vacina.create', ['bichinho' => $bichinho]);
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
            'vacina' => 'required',
            'check' => '',
            'pet_id' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório'
        ];

        $request->validate($rules, $feedback);
        
        $pet = $request->all();
        
        $id = $pet['pet_id'];

        Vacina::create($pet);

        return redirect()->route('bichinho.show', ['bichinho' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function show(Vacina $vacina)
    {
        if($vacina->check == 0) {
            $vacina['check'] = 1;
        }
        else if($vacina->check == 1) {
            $vacina['check'] = 0;
        }

        $vacina->save();

        return redirect()->route('bichinho.show', ['bichinho' => $vacina->pet_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacina $vacina)
    {
        return view('vacina.edit', ['vacina' => $vacina]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacina $vacina)
    {
        $rules = [
            'data' => 'required',
            'vacina' => 'required',
            'check' => '',
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

        $vacina->update($request->all());

        return redirect()->route('bichinho.show', $vacina->pet_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacina $vacina)
    {
        $vacina->delete();

        return redirect()->route('bichinho.show', ['bichinho' => $vacina->pet_id]);
    }
}
