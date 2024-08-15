<x-layout>

    <form method="GET" action="{{ route('cozinheiro.search') }}" class="my-5 flex justify-center">
        <input type="text" name="search" id="search-input" placeholder="Pesquisar cozinheiros..."
               class="w-1/2 p-2 rounded-md border border-gray-300 text-lg">

        <select name="filter" id="filter-select" class="ml-3 p-2 rounded-md border border-gray-300 text-lg">
            <option value="" class="block px-4 py-2 text-sm text-gray-500">Filtrar por...</option>
            <option value="disponiveis" {{ request('filter') == 'disponiveis' ? 'selected' : '' }} class="block px-4 py-2 text-sm text-gray-500">Disponíveis</option>
            <option value="maior_idade" {{ request('filter') == 'maior_idade' ? 'selected' : '' }} class="block px-4 py-2 text-sm text-gray-500">Maior idade</option>
            <option value="menor_idade" {{ request('filter') == 'menor_idade' ? 'selected' : '' }} class="block px-4 py-2 text-sm text-gray-500">Menor idade</option>
            <option value="menor_tempo_carreira" {{ request('filter') == 'menor_tempo_carreira' ? 'selected' : '' }} class="block px-4 py-2 text-sm text-gray-500">Menor tempo de Carreira</option>
            <option value="maior_tempo_carreira" {{ request('filter') == 'maior_tempo_carreira' ? 'selected' : '' }} class="block px-4 py-2 text-sm text-gray-500">Maior tempo de Carreira</option>
            <option value="cozinheiros_excluidos" {{ request('filter') == 'cozinheiros_excluidos' ? 'selected' : '' }} class="block px-4 py-2 text-sm text-gray-500">Cozinheiros Excluídos</option>
        </select>

        <button class="ml-3 bg-[#9CA986] text-[#FEFAE0] font-bold text-lg p-3 rounded-md hover:bg-[#b3bda3]" type="submit">Buscar</button>
    </form>

    <div class="flex justify-center my-5">
        <a href="{{ route('cozinheiro.showCreateForm') }}">
            <button class="ml-3 bg-[#9CA986] text-[#FEFAE0] font-bold text-lg p-3 rounded-md hover:bg-[#b3bda3]">Adicionar cozinheiro</button>
        </a>
    </div>



    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($cozinheiros as $cozinheiro)
            @if(!$cozinheiro->deleted_at)
                <a href="/cozinheiro/{{ $cozinheiro->id }}" class="block no-underline text-inherit">
                    @else
                        <a class="block no-underline text-inherit">
                            @endif
                            <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col transform transition-transform hover:scale-105">
                                <h1 class="text-2xl font-semibold text-gray-800 mb-3">Nome: {{ $cozinheiro->nome }}</h1>
                                <h3 class="text-lg text-gray-600 mb-2">Idade: {{ $cozinheiro->idade }}</h3>
                                <h3 class="text-lg text-gray-600 mb-2">Tempo de carreira: {{ $cozinheiro->tempo_carreira }}</h3>

                                @if($cozinheiro->deleted_at)
                                    <div class="flex gap-4 mt-4">
                                        <form action="{{ route('cozinheiro.forceDelete', $cozinheiro->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 text-white px-5 py-2 rounded-md">Excluir Permanentemente</button>
                                        </form>

                                        <form action="{{ route('cozinheiro.restore', $cozinheiro->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="bg-yellow-400 text-black px-5 py-2 rounded-md">Restaurar</button>
                                        </form>
                                    </div>
                                @else
                                    <form action="{{ route('cozinheiro.delete', $cozinheiro->id) }}" method="POST" class="mt-4">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white px-5 py-2 rounded-md">Excluir</button>
                                    </form>
                                @endif
                            </div>
                        </a>
                @endforeach
    </div>


</x-layout>





