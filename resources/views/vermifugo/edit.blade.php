@extends('layouts.app')

@section('content')
    <main class="min-h-screen flex justify-center max-w-screen">
        <div class="px-5 py-5 text-center flex flex-col gap-4 w-full md:w-3/4">
            <div class="p-10">
                <h1 class="text-green-500 text-center font-light tracking-wider text-2xl sm:mb-8 sm:text-4xl">
                    Vermifugo
                </h1>

                <div class="flex flex-col justify-center">
                    <form class="w-full p-6 space-y-6 sm:px-10 sm:space-y-8 bg-green-50 border border-green-500"
                        method="post" action="{{ route('vermifugo.update', ['vermifugo' => $vermifugo]) }}">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-wrap">
                            <label for="data" class="block text-black text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Data') }}:
                            </label>

                            <input id="data" type="date" class="focus:ring focus:ring-green-200 form-input w-full" name="data"
                                value="{{ $vermifugo->data }}" required>
                            {{ $errors->has('data') ? $errors->first('data') : '' }}

                        </div>

                        <div class="flex flex-wrap">
                            <label for="vermifugo" class="block text-black text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Vermifugo') }}:
                            </label>

                            <input id="vermifugo" type="text" class="focus:ring focus:ring-green-200 form-input w-full" name="vermifugo"
                                value="{{ $vermifugo->vermifugo }}" required>
                            {{ $errors->has('vermifugo') ? $errors->first('vermifugo') : '' }}
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit"
                                class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-white bg-green-500 hover:bg-green-400 sm:py-4">
                                {{ __('Atualizar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
