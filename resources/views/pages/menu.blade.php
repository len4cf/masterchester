<x-layout>


        <div class="flex flex-col items-center p-5 bg-[#9CA986] rounded-lg shadow-lg max-w-xl mx-auto">

            <h1 class="text-2xl mb-2 text-[#FEFAE0]">{{ $menu->descricao }}</h1>
            <h2 class="text-lg mb-2 text-[#FEFAE0]">Chef: {{ $menu->cozinheiro->nome }}</h2>

            @foreach($menu->foods as $food)

                <div class="bg-white rounded-lg shadow-lg p-4 my-2 w-72 transition-transform transform hover:scale-105 flex flex-col items-center text-center">
                    <p class="text-lg text-[#555] m-0">{{ $food->nome }}</p>
                    <div class="mt-2 w-full bg-[#f9f9f9] border-t border-[#e0e0e0] py-2">
                        <p class="text-base text-[#777] font-medium m-0">{{ $food->peso }}g</p>
                        <p class="text-base text-[#777] font-medium m-0">{{ $food->kcal }}kcal</p>
                        <p class="text-base text-[#777] font-medium m-0">Categoria: {{ $food->categoria }}</p>
                        <p class="text-base text-[#777] font-medium m-0">Preço: R$ {{ $food->preco }}</p>
                    </div>
                </div>

            @endforeach
        </div>






</x-layout>

