
<style>

    .lista-de-menus {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        background-color: #f4f4f4;
    }

    .lista-de-menus h1 {
        font-size: 2rem;
        margin-bottom: 10px;
        color: #333;
    }

    .card-comida {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 15px;
        margin: 10px 0;
        width: 300px;
        transition: transform 0.3s ease-in-out;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .card-comida:hover {
        transform: scale(1.05);
    }

    .card-comida p {
        font-size: 1.2rem;
        color: #555;
        margin: 0;
    }

    .card-comida-detalhes {
        margin-top: 10px;
        width: 100%;
        background-color: #f9f9f9;
        border-top: 1px solid #e0e0e0;
        padding: 10px 0 10px 0;
    }

    .card-comida-detalhes p {
        font-size: 1rem;
        color: #777;
        margin: 0;
        font-weight: 500;
    }
</style>


<div class="lista-de-menus">

    <h1>{{ $menu->descricao  }}</h1>
    <hr>



    @foreach($menu->foods as $food)

        <div class="card-comida">
            <p>{{ $food->nome }}</p>
            <div class="card-comida-detalhes">
                <p>{{ $food->peso }}g</p>
                <p>{{ $food->kcal }}kcal</p>
                <p>Categoria: {{ $food->categoria }}</p>
                <p>Preço: R$ {{ $food->preco  }}</p>
            </div>
        </div>

    @endforeach
</div>
