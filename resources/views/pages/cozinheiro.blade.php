<style>

    body {
        font-family: Arial, sans-serif;
        background-color: #FEFAE0;
        padding: 20px;
    }

    .chef-details {
        padding: 20px;
        background-color: #9CA986;
        border-radius: 10px;
        max-width: 600px;
        margin: auto;
    }

    .chef-details h1 {
        font-size: 2rem;
        color: #FEFAE0;
        margin-bottom: 10px;
    }

    .chef-details h3 {
        font-size: 1.2rem;
        color: #FEFAE0;
        margin-bottom: 5px;
    }

    .chef-details h4 {
        font-size: 1.5rem;
        color: #FEFAE0;
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .chef-details button {
        font-size: 1.2rem;
        color: #9CA986;
        background-color: #fff;
        border: none;
        cursor: pointer;
        padding: 10px;
        margin: 10px 0;
        width: 100%;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        transition: background-color 0.3s ease;
    }

    .chef-details button:hover {
        background-color: #dde6ce;
        color: #9CA986;
    }

</style>

<x-nav-menu/>

<div class="chef-details">
    <h1>Nome: {{ $cozinheiro->nome }}</h1>
    <h3>Idade: {{ $cozinheiro->idade }}</h3>
    <h3>Tempo de carreira: {{ $cozinheiro->tempo_carreira }}</h3>
    <h3>Menu especial do chef: {{ $cozinheiro->menus()->first()->descricao }}</h3>


    <a href="/menu/{{ $cozinheiro->id }}">
        <button>Ir para menu</button>
    </a>

</div>
