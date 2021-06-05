@extends('layouts.app')

@section('content')
    <main class="min-h-screen flex justify-center max-w-screen">
        <div class="px-5 md:px-15 py-10 w-full">
            <div class="mb-10 flex flex-row justify-between items-center">
                <span class="font-light text-xl sm:mb-8 sm:text-2xl text-green-500">{{ $bichinho->pet }}</span>
                <form id="form_{{ $bichinho['id'] }}" method="post"
                    action="{{ route('bichinho.destroy', $bichinho['id']) }}">
                    @csrf
                    @method('DELETE')
                    <a href="#"
                        onclick="document.getElementById('form_{{ $bichinho['id'] }}').submit()"><i
                            class="text-red-600 far fa-trash-alt"></i></a>
                </form>
            </div>
            <div class="grid grid-cols-1 gap-6 w-full">
                <div class="bg-white p-6 rounded-xl shadow-xl min-h-full relative">
                    <div class="circle bg-green-500 text-white rounded-full h-10 w-10 flex items-center justify-center">
                        <i class="fas fa-syringe"></i>
                    </div>
                    <div class="mt-2">
                        <div class="text-2xl font-semibold my-2 flex flex-row justify-between items-center">
                            <p>Vacinação</p>
                            <a href="{{ route('vacina.create') }}"><i
                                    class="text-green-500 text-lg far fa-plus-square"></i></a>
                        </div>

                        <div class="border-t-2"></div>

                        <div class="mt-10 flex flex-col gap-5 text-sm md:text-base justify-between">
                            @foreach ($vacina as $vac)
                                <div class="flex flex-row gap-2 md:gap-4 items-center justify-between">
                                    <a href="{{ route('vacina.show', $vac['id']) }}">
                                        @if($vac->check == 0)
                                            <i class="text-red-600 far fa-square"></i>
                                        @elseif($vac->check == 1)
                                            <i class="text-green-500 far fa-check-square"></i>
                                        @endif
                                    </a>
                                    <span>{{ date('d/m/Y', strtotime($vac->data)) }}</span>
                                    <i class="mx-2 text-sm fas fa-arrow-right"></i>
                                    <span class="flex-grow">{{ $vac->vacina }}</span>
                                    <a href="{{ route('vacina.edit', $vac['id']) }}"><i class="far fa-edit"></i></a>
                                    <form id="form_{{ $vac['id'] }}" method="post"
                                        action="{{ route('vacina.destroy', $vac['id']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $vac['id'] }}').submit()"><i
                                                class="far fa-trash-alt"></i></a>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-xl min-h-full relative">
                    <div class="circle bg-green-500 text-white rounded-full h-10 w-10 flex items-center justify-center">
                        <i class="fas fa-syringe"></i>
                    </div>
                    <div class="mt-2">
                        <div class="text-2xl font-semibold my-2 flex flex-row justify-between items-center">
                            <p>Vermifugo</p>
                            <a href="{{ route('vermifugo.create') }}"><i
                                    class="text-green-500 text-lg far fa-plus-square"></i></a>
                        </div>

                        <div class="border-t-2"></div>

                        <div class="mt-10 flex flex-col gap-5 text-sm md:text-base justify-between">
                            @foreach ($vermifugo as $ver)
                            <div class="flex flex-row gap-2 md:gap-4 items-center justify-between">                                    
                                <a href="{{ route('vermifugo.show', $ver['id']) }}">
                                        @if($ver->check == 0)
                                            <i class="text-red-600 far fa-square"></i>
                                        @elseif($ver->check == 1)
                                            <i class="text-green-500 far fa-check-square"></i>
                                        @endif
                                    </a>
                                    <span>{{ date('d/m/Y', strtotime($ver->data)) }}</span>
                                    <i class="mx-2 text-sm fas fa-arrow-right"></i>
                                    <span class="flex-grow">{{ $ver->vermifugo }}</span>
                                    <a href="{{ route('vermifugo.edit', $ver['id']) }}"><i class="far fa-edit"></i></a>
                                    <form id="form_{{ $ver['id'] }}" method="post"
                                        action="{{ route('vermifugo.destroy', $ver['id']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $ver['id'] }}').submit()"><i
                                                class="far fa-trash-alt"></i></a>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-xl min-h-full relative">
                    <div class="circle bg-green-500 text-white rounded-full h-10 w-10 flex items-center justify-center">
                        <i class="fas fa-syringe"></i>
                    </div>
                    <div class="mt-2">
                        <div class="text-2xl font-semibold my-2 flex flex-row justify-between items-center">
                            <p>Medicação</p>
                            <a href="{{ route('medicamento.create') }}"><i
                                    class="text-green-500 text-lg far fa-plus-square"></i></a>
                        </div>

                        <div class="border-t-2"></div>

                        <div class="mt-10 flex flex-col gap-5 text-sm md:text-base justify-between">
                            @foreach ($medicamento as $med)
                            <div class="flex flex-row gap-2 md:gap-4 items-center justify-between">                                    
                                <a href="{{ route('medicamento.show', $med['id']) }}">
                                        @if($med->check == 0)
                                            <i class="text-red-600 far fa-square"></i>
                                        @elseif($med->check == 1)
                                            <i class="text-green-500 far fa-check-square"></i>
                                        @endif
                                    </a>
                                    <span>{{ date('d/m/Y', strtotime($med->data_inicio)) }} @isset($med->data_final) - {{ date('d/m/Y', strtotime($med->data_final)) }} @endisset</span>
                                    <i class="mx-2 text-sm fas fa-arrow-right"></i>
                                    <span class="flex-grow">
                                        {{ $med->medicamento }} ({{ $med->dosagem }} 
                                        @if($med->dosagem > 1)
                                            {{ Str::ucfirst($med->medida .= 's') }}
                                        @else
                                        {{ Str::ucfirst($med->medida) }}
                                        @endif)
                                    </span>
                                    <a href="{{ route('medicamento.edit', $med['id']) }}"><i class="far fa-edit"></i></a>
                                    <form id="form_{{ $med['id'] }}" method="post"
                                        action="{{ route('medicamento.destroy', $med['id']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $med['id'] }}').submit()"><i
                                                class="far fa-trash-alt"></i></a>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-xl min-h-full relative">
                    <div class="circle bg-green-500 text-white rounded-full h-10 w-10 flex items-center justify-center">
                        <i class="fas fa-syringe"></i>
                    </div>
                    <div class="mt-2">
                        <div class="text-2xl font-semibold my-2 flex flex-row justify-between items-center">
                            <p>Alimentação</p>
                            <a href="{{ route('alimento.create') }}"><i
                                    class="text-green-500 text-lg far fa-plus-square"></i></a>
                        </div>

                        <div class="border-t-2"></div>

                        <div class="mt-10 flex flex-col gap-5 text-sm md:text-base justify-between">
                            @foreach ($alimento as $ali)
                                <div class="flex flex-row gap-2 md:gap-4 items-center justify-between">
                                    <span>{{ date('d/m/Y', strtotime($ali->data)) }}</span>
                                    <i class="mx-2 text-sm fas fa-arrow-right"></i>
                                    <span class="flex-grow">{{ $ali->descricao }}</span>
                                    <a href="{{ route('alimento.edit', $ali['id']) }}"><i class="far fa-edit"></i></a>
                                    <form id="form_{{ $ali['id'] }}" method="post"
                                        action="{{ route('alimento.destroy', $ali['id']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $ali['id'] }}').submit()"><i
                                                class="far fa-trash-alt"></i></a>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-xl min-h-full relative">
                    <div class="circle bg-green-500 text-white rounded-full h-10 w-10 flex items-center justify-center">
                        <i class="fas fa-syringe"></i>
                    </div>
                    <div class="mt-2">
                        <div class="text-2xl font-semibold my-2 flex flex-row justify-between items-center">
                            <p>Crescimento</p>
                            <a href="{{ route('crescimento.create') }}"><i
                                    class="text-green-500 text-lg far fa-plus-square"></i></a>
                        </div>

                        <div class="border-t-2"></div>

                        <div class="mt-10 flex flex-col gap-5 text-sm md:text-base justify-between">
                            @foreach ($crescimento as $cresc)
                                <div class="flex flex-row gap-2 md:gap-4 items-center justify-between">
                                    <span>{{ date('d/m/Y', strtotime($cresc->data)) }}</span>
                                    <i class="mx-2 text-sm fas fa-arrow-right"></i>
                                    <span class="flex-grow">{{ $cresc->kg }},{{ $cresc->g }} Kg</span>
                                    <a href="{{ route('crescimento.edit', $cresc['id']) }}"><i class="far fa-edit"></i></a>
                                    <form id="form_{{ $cresc['id'] }}" method="post"
                                        action="{{ route('crescimento.destroy', $cresc['id']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $cresc['id'] }}').submit()"><i
                                                class="far fa-trash-alt"></i></a>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-xl min-h-full relative">
                    <div class="circle bg-green-500 text-white rounded-full h-10 w-10 flex items-center justify-center">
                        <i class="fas fa-syringe"></i>
                    </div>
                    <div class="mt-2">
                        <div class="text-2xl font-semibold my-2 flex flex-row justify-between items-center">
                            <p>Outros</p>
                            <a href="{{ route('outro.create') }}"><i
                                    class="text-green-500 text-lg far fa-plus-square"></i></a>
                        </div>

                        <div class="border-t-2"></div>

                        <div class="mt-10 flex flex-col gap-5 text-sm md:text-base justify-between">
                            @foreach ($outros as $outro)
                                <div class="flex flex-row gap-2 md:gap-4 items-center justify-between">
                                    <span>{{ date('d/m/Y', strtotime($outro->data)) }}</span>
                                    <i class="mx-2 text-sm fas fa-arrow-right"></i>
                                    <span class="flex-grow">{{ $outro->outros }}</span>
                                    <a href="{{ route('outro.edit', $outro['id']) }}"><i class="far fa-edit"></i></a>
                                    <form id="form_{{ $outro['id'] }}" method="post"
                                        action="{{ route('outro.destroy', $outro['id']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $outro['id'] }}').submit()"><i
                                                class="far fa-trash-alt"></i></a>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
