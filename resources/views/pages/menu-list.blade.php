<style>
    .lista-de-menus {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: auto;
    }

    .lista-de-menus h1 {
        font-size: 2rem;
        color: #555;
        margin-bottom: 10px;
    }

    .lista-de-menus p {
        font-size: 1.2rem;
        color: #555;
        background-color: #fff;
        padding: 10px;
        margin: 10px 0;
        width: 100%;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        transition: background-color 0.3s ease;
    }

    .lista-de-menus p:hover {
        background-color: #555555;
        color: #fff;
    }

    hr {
        width: 80%;
        border: 0;
        border-top: 2px solid #eee;
        margin: 20px 0;
    }
</style>

<div class="lista-de-menus">
    <h1>Menus disponíveis</h1>
    <hr>

    @foreach($menus as $menu)
        <p>{{ $menu->descricao }}</p>
    @endforeach
</div>
