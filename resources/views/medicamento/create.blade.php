@extends('layouts.app')

@section('content')
    <main class="min-h-screen flex justify-center max-w-screen">
        <div class="px-5 py-5 text-center flex flex-col gap-4 w-full md:w-3/4">
            <div class="p-10">
                <h1 class="text-green-500 text-center font-light tracking-wider text-2xl sm:mb-8 sm:text-4xl">
                    Medicação
                </h1>

                <div class="flex flex-col justify-center">
                    <form class="w-full p-6 space-y-6 sm:px-10 sm:space-y-8 bg-green-50 border border-green-500"
                        method="post" action="{{ route('medicamento.store') }}">
                        @csrf

                        <div class="flex flex-row flex-wrap gap-10">
                            <label for="pet_id" class="block text-black text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Pet') }}:
                            </label>

                            <select name="pet_id" class="block text-black text-sm mb-2 sm:mb-4" autofocus required>
                                <option value="" selected disabled>-- Selecione um Pet --</option>
                                @foreach ($bichinho as $pet)
                                    <option value="{{$pet->id}}">{{$pet->pet}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-wrap">
                            <label for="data_inicio" class="block text-black text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Data de Início') }}:
                            </label>

                            <input id="data_inicio" type="date" class="focus:ring focus:ring-green-200 form-input w-full" name="data_inicio"
                                value="{{ old('data_inicio') }}" required>
                            {{ $errors->has('data_inicio') ? $errors->first('data_inicio') : '' }}

                        </div>

                        <div class="flex flex-wrap">
                            <label for="data_final" class="block text-black text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Data de Término') }}:
                            </label>

                            <input id="data_final" type="date" class="focus:ring focus:ring-green-200 form-input w-full" name="data_final"
                                value="{{ old('data_final') }}">
                            {{ $errors->has('data_final') ? $errors->first('data_final') : '' }}

                        </div>

                        <div class="flex flex-wrap">
                            <label for="medicamento" class="block text-black text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Medicamento') }}:
                            </label>

                            <input id="medicamento" type="text" class="focus:ring focus:ring-green-200 form-input w-full" name="medicamento"
                                value="{{ old('medicamento') }}" required>
                            {{ $errors->has('medicamento') ? $errors->first('medicamento') : '' }}
                        </div>

                        <div class="flex flex-wrap">
                            <label for="dosagem" class="block text-black text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Dosagem') }}:
                            </label>

                            <input id="dosagem" type="text" class="focus:ring focus:ring-green-200 form-input w-full" name="dosagem"
                                value="{{ old('dosagem') }}" required>
                            {{ $errors->has('dosagem') ? $errors->first('dosagem') : '' }}
                        </div>

                        <div class="flex flex-row flex-wrap gap-10">
                            <label for="medida" class="block text-black text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Medida') }}:
                            </label>

                            <select name="medida" class="block text-black text-sm mb-2 sm:mb-4" required>
                                <option value="" selected disabled>-- Selecione uma Medida --</option>
                                <option value="comprimido">Comprimido</option>
                                <option value="ml">Mililitro (mL)</option>
                                <option value="capsula">Cápsula</option>
                            </select>
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit"
                                class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-white bg-green-500 hover:bg-green-400 sm:py-4">
                                {{ __('Adicionar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
