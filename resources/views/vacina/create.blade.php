@extends('layouts.app')

@section('content')
    <main class="min-h-screen flex justify-center max-w-screen">
        <div class="px-5 py-5 text-center flex flex-col gap-4 w-full md:w-3/4">
            <div class="p-10">
                <h1 class="text-green-500 text-center font-light tracking-wider text-2xl sm:mb-8 sm:text-4xl">
                    Vacinação
                </h1>

                <div class="flex flex-col justify-center">
                    <form class="w-full p-6 space-y-6 sm:px-10 sm:space-y-8 bg-green-50 border border-green-500"
                        method="post" action="{{ route('vacina.store') }}">
                        @csrf

                        <div class="flex flex-row flex-wrap gap-10">
                            <label for="pet_id" class="block text-black text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Pet') }}:
                            </label>

                            <select name="pet_id" class="block text-black text-sm mb-2 sm:mb-4" autofocus required>
                                <option>-- Selecione um Pet --</option>
                                @foreach ($bichinho as $pet)
                                    <option value="{{$pet->id}}">{{$pet->pet}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-wrap">
                            <label for="data" class="block text-black text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Data') }}:
                            </label>

                            <input id="data" type="date" class="focus:ring focus:ring-green-200 form-input w-full" name="data"
                                value="{{ old('data') }}" required>
                            {{ $errors->has('data') ? $errors->first('data') : '' }}

                        </div>

                        <div class="flex flex-wrap">
                            <label for="vacina" class="block text-black text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Vacina') }}:
                            </label>

                            <input id="vacina" type="text" class="focus:ring focus:ring-green-200 form-input w-full" name="vacina"
                                value="{{ old('vacina') }}" required>
                            {{ $errors->has('vacina') ? $errors->first('vacina') : '' }}
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
