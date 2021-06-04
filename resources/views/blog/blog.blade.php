@extends('layouts.index')

@section('content')
    <main class="min-h-screen flex items-center justify-center max-w-screen p-10 md:px-20">
        <div class="flex flex-col h-full w-full gap-10">
            <div class="text-center">
                <h1 class="text-green-500 font-light tracking-wider text-6xl sm:text-8xl">
                    PerdigaSon Blog
                </h1>
            </div>

            <div class="flex flex-col md:flex-row gap-x-4 container rounded-md m-2 bg-white w-full h-full">
                <div class="w-full md:w-1/2 flex">
                    <img class="rounded-t-md md:rounded-t-none md:rounded-l-md self-center" src="{{ asset('black.png') }}">
                </div>
                <div class="w-full md:w-1/2 p-10 justify-center">
                    <h1 class="text-green-500 text-center font-light tracking-wider text-4xl mb-8 sm:text-6xl">
                        PerdigaSon
                    </h1>
                    <div class="text-base sm:text-lg flex flex-col gap-4 sm:gap-8 text-justify">
                        <p>
                            PerdigaSon é um site criado para te auxiliar nos cuidados com o seu pet!
                        </p>
                        <p>
                            E se você assim como a gente gostaria de ter tudo do seu bichinho anotado em um só lugar, aqui é o lugar
                            ideal pra vocês!
                        </p>
                        <p>
                            Aqui você pode ter um calendário de vacinação e vermifugação, anotações de medicamentos, quantidade de
                            alimento, acompanhamento de crescimento...
                        </p>
                        <p>
                            Além de disso contamos com um blog com conteúdos úteis a respeito dos anjinhos!
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-x-4 container rounded-md m-2 bg-white w-full h-full">
                <div class="w-full md:w-1/2 flex">
                    <img class="rounded-t-md md:rounded-t-none md:rounded-l-md self-center" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBLVOazFtCkTIGC8I7dxqI8YZuFkpcUeHSkEAO6PoX_5aPyMTMj4_JfEPvmaahceDI2aE&usqp=CAU" width="630" height="1200">
                </div>
                <div class="w-full md:w-1/2 p-10 justify-center">
                    <h1 class="text-green-500 text-center font-light tracking-wider text-4xl mb-8 sm:text-6xl">
                        PerdigaSon
                    </h1>
                    <div class="text-base sm:text-lg flex flex-col gap-4 sm:gap-8 text-justify">
                        <p>
                            PerdigaSon é um site criado para te auxiliar nos cuidados com o seu pet!
                        </p>
                        <p>
                            E se você assim como a gente gostaria de ter tudo do seu bichinho anotado em um só lugar, aqui é o lugar
                            ideal pra vocês!
                        </p>
                        <p>
                            Aqui você pode ter um calendário de vacinação e vermifugação, anotações de medicamentos, quantidade de
                            alimento, acompanhamento de crescimento...
                        </p>
                        <p>
                            Além de disso contamos com um blog com conteúdos úteis a respeito dos anjinhos!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection