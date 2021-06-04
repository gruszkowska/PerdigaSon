@extends('layouts.index')

@section('content')
    <main class="min-h-screen flex justify-center max-w-screen">
        <div class="p-20 text-center flex flex-col gap-4">
            <h1 class="text-green-500 font-light tracking-wider text-6xl sm:mb-8 sm:text-8xl mb-8">
                Bem-vindo!
            </h1>
            <div class="text-lg sm:text-2xl flex flex-col gap-4 sm:gap-8">
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
    </main>
@endsection
