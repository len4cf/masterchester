<x-layout>
    <div class="p-5 bg-[#9CA986] rounded-lg max-w-2xl mx-auto">
        <h1 class="text-2xl text-[#FEFAE0] mb-2">
            Nome: {{ $cozinheiro->nome }}
        </h1>
        <h3 class="text-lg text-[#FEFAE0] mb-1">
            Idade: {{ $cozinheiro->idade }}
        </h3>
        <h3 class="text-lg text-[#FEFAE0] mb-1">
            Tempo de carreira: {{ $cozinheiro->tempo_carreira }}
        </h3>
        {{-- <h3 class="text-lg text-[#FEFAE0] mb-1">
            Menu especial do chef: {{ $cozinheiro->menus()->first()->descricao }}
        </h3> --}}

        <a href="/menu/{{ $cozinheiro->id }}">
            <button class="text-lg text-[#9CA986] bg-white border-none cursor-pointer py-2 px-4 my-2 w-full rounded-lg shadow-md transition-colors duration-300 hover:bg-[#dde6ce] hover:text-[#9CA986]">
                Ir para menu
            </button>
        </a>
    </div>
</x-layout>



