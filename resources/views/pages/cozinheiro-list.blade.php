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

    .chef-card-link {
        text-decoration: none;
        color: inherit;
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

    .searchBtn {
        width: 200px;
        padding: 20px;
        border-radius: 15px;
        border: none;
        color: #FEFAE0;
        font-weight: bold;
        font-size: 20px;
        cursor: pointer;
        background-color: #9CA986;
    }

    .searchBtn:hover {
        background-color: #b3bda3;
    }

    form {
        gap: 10px;
    }




</style>

<x-nav-menu/>

    <form method="GET" action="{{ route('cozinheiro.search') }}" class="search-container">
        <input type="text" name="search" id="search-input" placeholder="Pesquisar cozinheiros...">

        <select name="filter" id="filter-select">
            <option value="">Filtrar por...</option>
            <option value="disponiveis" {{ request('filter') == 'disponiveis' ? 'selected' : '' }}>Disponiveis</option>
            <option value="maior_idade" {{ request('filter') == 'maior_idade' ? 'selected' : '' }}>Maior idade</option>
            <option value="menor_idade" {{ request('filter') == 'menor_idade' ? 'selected' : '' }}>Menor idade</option>
            <option value="menor_tempo_carreira" {{ request('filter') == 'menor_tempo_carreira' ? 'selected' : '' }}>Menor tempo de Carreira</option>
            <option value="maior_tempo_carreira" {{ request('filter') == 'maior_tempo_carreira' ? 'selected' : '' }}>Maior tempo de Carreira</option>
            <option value="cozinheiros_excluidos" {{ request('filter') == 'cozinheiros_excluidos' ? 'selected' : '' }}>Cozinheiros Excluídos</option>
        </select>

        <button class="searchBtn" type="submit">Buscar</button>


    </form>



        <div class="grid-container">

            @foreach($cozinheiros as $cozinheiro)

                @if(!$cozinheiro->deleted_at)

                    <a href="/cozinheiro/{{ $cozinheiro->id }}" class="chef-card-link">


                        @elseif($cozinheiro->deleted_at)

                        <a class="chef-card-link">

                @endif

            <div class="chef-card">
                <h1>Nome: {{ $cozinheiro->nome }}</h1>
                <h3>Idade: {{ $cozinheiro->idade }}</h3>
                <h3>Tempo de carreira: {{ $cozinheiro->tempo_carreira }}</h3>


                @if($cozinheiro->deleted_at)
                    <form action="{{ route('cozinheiro.forceDelete', $cozinheiro->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir Permanentemente</button>
                    </form>

                    <form action="{{ route('cozinheiro.restore', $cozinheiro->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-primary">Restaurar</button>
                    </form>
                @else
                    <form action="{{ route('cozinheiro.delete', $cozinheiro->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                @endif
            </div>

            </a>

            @endforeach

        </div>
