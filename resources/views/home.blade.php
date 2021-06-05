@extends('layouts.app')

@section('content')
    <main class="min-h-screen flex justify-center max-w-screen">
        <div class="px-5 py-5 text-center flex flex-col gap-4 w-full">
            <div class="text-lg sm:text-xl flex flex-col gap-4 sm:gap-8">
                <p>
                    Parabéns, você é o mais novo membro do PerdigaSon!
                </p>
                <p>
                    Selecione ou adicione um pet para continuar.
                </p>
            </div>
            <div class="flex flex-col md:flex-row gap-4 container rounded-md m-2 bg-white w-full">
                @isset($bichinho)
                    <div class="md:w-1/2 p-10 justify-center bg-green-500 rounded-l-md pb-20">
                        <h1 class="text-white text-center font-light tracking-wider text-2xl sm:mb-8 sm:text-4xl">
                            Selecione um Pet
                        </h1>
                        <div class="flex flex-col items-center justify-center mt-20 md:mt-32">
                            @foreach ($bichinho as $key => $pet)
                            <ul class="text-white text-center font-light tracking-wider text-xl sm:mb-8 sm:text-2xl flex flex-col gap-y-4">
                                <li>
                                    <a href="{{ route('bichinho.show', ['bichinho' => $pet->id]) }}" class="no-underline hover:underline">{{ $pet->pet }}</a>
                                </li>
                            </ul> 
                            @endforeach
                        </div>
                    </div>
                @endisset
                

                <div class="md:w-1/2 p-10">
                    <h1 class="text-green-500 text-center font-light tracking-wider text-2xl sm:mb-8 sm:text-4xl">
                        Adicione um Pet
                    </h1>

                    <div class="flex flex-col justify-center">
                        <form class="w-full p-6 space-y-6 sm:px-10 sm:space-y-8 bg-green-50 border border-green-500"
                            method="post" action="{{ route('bichinho.store') }}">
                            @csrf

                            <div class="flex flex-wrap">
                                <label for="pet" class="block text-black text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Pet') }}:
                                </label>

                                <input id="pet" type="text"
                                    class="focus:ring focus:ring-green-200 form-input w-full"
                                    name="pet" value="{{ old('pet') }}" required autofocus>
                                {{ $errors->has('pet') ? $errors->first('pet') : '' }}

                            </div>

                            <div class="flex flex-row flex-wrap gap-10">
                                <label for="especie" class="block text-black text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Espécie') }}:
                                </label>

                                <select name="especie" class="block text-black text-sm mb-2 sm:mb-4">
                                    <option value="" selected disabled>-- Selecione uma espécie --</option>
                                    <option value="canino" {{ old('especie') }}>Cachorro</option>
                                    <option value="felino" {{ old('especie') }}>Gato</option>
                                    <option value="ave" {{ old('especie') }}>Pássaro</option>
                                    <option value="peixe" {{ old('especie') }}>Peixe</option>
                                </select>
                            </div>

                            <div class="flex flex-wrap">
                                <label for="raca" class="block text-black text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Raça') }}:
                                </label>

                                <input id="raca" type="text"
                                    class="focus:ring focus:ring-green-200 form-input w-full"
                                    name="raca" value="{{ old('raca') }}" required>
                                {{ $errors->has('raca') ? $errors->first('raca') : '' }}
                            </div>

                            <div class="flex flex-wrap">
                                <label for="idade_ano" class="block text-black text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Anos') }}:
                                </label>

                                <input id="idade_ano" type="number" min="0"
                                    class="focus:ring focus:ring-green-200 form-input w-full"
                                    name="idade_ano" required>
                                {{ $errors->has('idade_ano') ? $errors->first('idade_ano') : '' }}
                            </div>

                            <div class="flex flex-wrap">
                                <label for="idade_mes" class="block text-black text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Meses') }}:
                                </label>

                                <input id="idade_mes" type="number" min="0"
                                    class="focus:ring focus:ring-green-200 form-input w-full"
                                    name="idade_mes" required>
                                {{ $errors->has('idade_mes') ? $errors->first('idade_mes') : '' }}
                            </div>

                            <div class="flex flex-wrap">
                                <button type="submit"
                                    class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-white bg-green-500 hover:bg-green-400 sm:py-4">
                                    {{ __('Adicione') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
