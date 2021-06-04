<?php

namespace App\Http\Controllers;

use App\Models\Alimento;
use App\Models\Bichinho;
use App\Models\Crescimento;
use App\Models\Medicamento;
use App\Models\Outro;
use App\Models\User;
use App\Models\Vacina;
use App\Models\Vermifugo;
use Illuminate\Http\Request;

class BichinhoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pet = $request->all();
        $pet['guardiao_id'] = auth()->user()->id;
        
        Bichinho::create($pet);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bichinho  $bichinho
     * @return \Illuminate\Http\Response
     */
    public function show(Bichinho $bichinho)
    {
        auth()->user()->pet_id = $bichinho->id;

        $vacina = Vacina::where('pet_id', $bichinho['id'])->get();

        $vermifugo = Vermifugo::where('pet_id', $bichinho['id'])->get();

        $medicamento = Medicamento::where('pet_id', $bichinho['id'])->get();

        $alimento = Alimento::where('pet_id', $bichinho['id'])->get();

        $crescimento = Crescimento::where('pet_id', $bichinho['id'])->get();

        $outros = Outro::where('pet_id', $bichinho['id'])->get();

        return view('pet', [
            'bichinho' => $bichinho, 
            'vacina' => $vacina, 
            'vermifugo' => $vermifugo, 
            'medicamento' => $medicamento,
            'alimento' => $alimento,
            'crescimento' => $crescimento,
            'outros' => $outros,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bichinho  $bichinho
     * @return \Illuminate\Http\Response
     */
    public function edit(Bichinho $bichinho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bichinho  $bichinho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bichinho $bichinho)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bichinho  $bichinho
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bichinho $bichinho)
    {
        //
    }
}
