<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #FEFAE0;
        padding: 20px;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 20px;
    }

    .chef-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 15px;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease-in-out;
    }

    .chef-card h1, .chef-card h3 {
        margin: 0;
        flex-grow: 1;
    }

    .chef-card h1 {
        font-size: 30px;
        margin-bottom: 10px;
    }

    .chef-card:hover {
        transform: scale(1.03);
    }

    .search-container {
        margin-bottom: 20px;
        display: flex;
        justify-content: center;
    }

    .search-container input {
        width: 50%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 16px;
    }


</style>

<x-nav-menu/>

    <form method="GET" action="{{ route('cozinheiro.search') }}" class="search-container">
        <input type="text" name="search" id="search-input" placeholder="Pesquisar cozinheiros...">
        <input type="button" name="filterBy" id="search-input" >
    </form>

<div class="grid-container">


    @foreach($cozinheiros as $cozinheiro)
        <div class="chef-card">
            <h1>Nome: {{ $cozinheiro->nome }}</h1>
            <h3>Idade: {{ $cozinheiro->idade }}</h3>
            <h3>Tempo de carreira: {{ $cozinheiro->tempo_carreira }}</h3>

{{--            <div class="chef-card-actions">--}}
{{--                <button class="botao-excluir">Excluir</button>--}}
{{--                <button class="botao-atualizar">Atualizar</button>--}}
{{--            </div>--}}

        </div>
    @endforeach
</div>
