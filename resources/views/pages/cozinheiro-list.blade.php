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

    /*.chef-card-actions {*/
    /*    margin-top: auto;*/
    /*    display: flex;*/
    /*    justify-content: space-between;*/
    /*    padding-top: 30px;*/
    /*}*/

    /*.chef-card-actions button {*/
    /*    padding: 8px 12px;*/
    /*    border: none;*/
    /*    border-radius: 5px;*/
    /*    color: black;*/
    /*    cursor: pointer;*/
    /*    transition: background-color 0.3s ease-in-out;*/
    /*    font-weight: bold;*/
    /*}*/

    /*.botao-excluir {*/
    /*    background-color: #B06161;*/
    /*}*/

    /*.botao-excluir:hover {*/
    /*    background-color: #cb7f7f;*/
    /*}*/

    /*.botao-atualizar {*/
    /*    background-color: #FCDC94;*/
    /*}*/

    /*.botao-atualizar:hover {*/
    /*    background-color: #e7d9ad;*/
    /*}*/


</style>

<x-nav-menu/>

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
