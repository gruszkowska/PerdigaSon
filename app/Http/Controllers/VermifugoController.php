<?php

namespace App\Http\Controllers;

use App\Models\Bichinho;
use App\Models\Vermifugo;
use Illuminate\Http\Request;

class VermifugoController extends Controller
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
        
        return view('vermifugo.create', ['bichinho' => $bichinho]);
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
            'vermifugo' => 'required',
            'check' => '',
            'pet_id' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório'
        ];

        $request->validate($rules, $feedback);
        
        $pet = $request->all();
        
        $id = $pet['pet_id'];

        Vermifugo::create($pet);

        return redirect()->route('bichinho.show', ['bichinho' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vermifugo  $vermifugo
     * @return \Illuminate\Http\Response
     */
    public function show(Vermifugo $vermifugo)
    {
        if($vermifugo->check == 0) {
            $vermifugo['check'] = 1;
        }
        else if($vermifugo->check == 1) {
            $vermifugo['check'] = 0;
        }

        $vermifugo->save();

        return redirect()->route('bichinho.show', ['bichinho' => $vermifugo->pet_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vermifugo  $vermifugo
     * @return \Illuminate\Http\Response
     */
    public function edit(Vermifugo $vermifugo)
    {
        return view('vermifugo.edit', ['vermifugo' => $vermifugo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vermifugo  $vermifugo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vermifugo $vermifugo)
    {
        $rules = [
            'data' => 'required',
            'vermifugo' => 'required',
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

        $vermifugo->update($request->all());

        return redirect()->route('bichinho.show', $vermifugo->pet_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vermifugo  $vermifugo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vermifugo $vermifugo)
    {
        $vermifugo->delete();

        return redirect()->route('bichinho.show', ['bichinho' => $vermifugo->pet_id]);
    }
}
