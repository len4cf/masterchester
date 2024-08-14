<style>
    .chef-details {
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 10px;
        max-width: 600px;
        margin: auto;
    }

    .chef-details h1 {
        font-size: 2rem;
        color: #333;
        margin-bottom: 10px;
    }

    .chef-details h3 {
        font-size: 1.2rem;
        color: #555;
        margin-bottom: 5px;
    }

    .chef-details h4 {
        font-size: 1.5rem;
        color: #444;
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .food-item {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 15px;
        margin: 10px 0;
        transition: transform 0.3s ease-in-out;
    }

    .food-item:hover {
        transform: scale(1.05);
    }

    .food-item p {
        font-size: 1rem;
        color: #666;
        margin: 5px 0;
    }

    .food-item hr {
        border: 0;
        border-top: 1px solid #eee;
    }
</style>

<div class="chef-details">
    <h1>Nome: {{ $cozinheiro->nome }}</h1>
    <h3>Idade: {{ $cozinheiro->idade }}</h3>
    <h3>Tempo de carreira: {{ $cozinheiro->tempo_carreira }}</h3>
    <h3>Menu especial do chef: {{ $cozinheiro->menus()->first()->descricao }}</h3>

    @php
        $foods = $cozinheiro->menus()->first()->foods;
    @endphp

    <div>
        <h4>Lista de pratos</h4>

        @foreach($foods as $food)
            <div class="food-item">
                <p>Nome: {{ $food->nome }}</p>
                <p>Peso: {{ $food->peso }}g</p>
                <p>Calorias: {{ $food->kcal }} kcal</p>
                <p>Categoria: {{ $food->categoria }}</p>
                <p>Preço: R$ {{ $food->preco }}</p>
                <hr>
            </div>
        @endforeach
    </div>
</div>
