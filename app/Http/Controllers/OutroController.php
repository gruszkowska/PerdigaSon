<?php

namespace App\Http\Controllers;

use App\Models\Bichinho;
use App\Models\Outro;
use Illuminate\Http\Request;

class OutroController extends Controller
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
        
        return view('outro.create', ['bichinho' => $bichinho]);
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
            'outros' => 'required',
            'pet_id' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório'
        ];

        $request->validate($rules, $feedback);
        
        $pet = $request->all();
        
        $id = $pet['pet_id'];

        Outro::create($pet);

        return redirect()->route('bichinho.show', ['bichinho' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outro  $outro
     * @return \Illuminate\Http\Response
     */
    public function show(Outro $outro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outro  $outro
     * @return \Illuminate\Http\Response
     */
    public function edit(Outro $outro)
    {
        return view('outro.edit', ['outro' => $outro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outro  $outro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outro $outro)
    {
        $rules = [
            'data' => 'required',
            'outros' => 'required',
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

        $outro->update($request->all());

        return redirect()->route('bichinho.show', $outro->pet_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outro  $outro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outro $outro)
    {
        $outro->delete();

        return 'ok';
    }
}
