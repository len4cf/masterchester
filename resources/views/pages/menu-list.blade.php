
<x-layout>


    <div class="flex flex-col items-center p-5 bg-[#9CA986] rounded-lg shadow-lg max-w-xl mx-auto">
        <h1 class="text-2xl text-[#FEFAE0] mb-2">Menus disponíveis</h1>
        <hr class="w-4/5 border-0 border-t-2 border-[#eee] my-5">


        @foreach($menus as $menu)


            <a href="/menu/{{ $menu->id }}" class="text-lg text-[#9CA986] bg-white p-2.5 my-2 w-full rounded-md shadow-md hover:bg-[#cad2bc] hover:text-white transition ease-in-out duration-300">{{ $menu->descricao }}</a>


        @endforeach

    </div>
</x-layout>
