<x-layout>
    <div class="max-w-xl mx-auto p-5 bg-[#9CA986] text-[#FEFAE0] rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-5 text-center">Atualizar Cozinheiro</h1>

        <form action="/cozinheiro/{{ $cozinheiro->id }}/edit" method="POST" class="space-y-4">
            @csrf
            <div class="space-y-2">
                <label for="nome" class="block text-[#FEFAE0] font-medium"  >Nome do Cozinheiro:</label>
                <input type="text" id="nome" name="nome" value="{{ $cozinheiro->nome }}" required class="w-full p-2 border border-gray-300 rounded-md text-black ">
                <label for="idade" class="block text-[#FEFAE0] font-medium">Idade do Cozinheiro:</label>
                <input type="text" id="idade" name="idade" value="{{ $cozinheiro->idade }}" required class="w-full p-2 border border-gray-300 rounded-md text-black ">
                <label for="tempo_carreira" class="block text-[#FEFAE0] font-medium">Tempo de carreira do Cozinheiro:</label>
                <input type="number" id="tempo_carreira" name="tempo_carreira" value="{{ $cozinheiro->tempo_carreira }}" required class="w-full p-2 border border-gray-300 rounded-md text-black ">
            </div>

            <div class="text-center">
                <button type="submit" class="px-4 py-2 bg-[#FEFAE0] text-[#9CA986] font-semibold rounded-md hover:bg-[#FEFAE0] ">Atualizar cozinheiro</button>
            </div>
        </form>
    </div>
</x-layout>


