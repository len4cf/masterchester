<style>

    body {
        font-family: Arial, sans-serif;
        background-color: #FEFAE0;
        padding: 20px;
    }

    .lista-de-menus {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        background-color: #9CA986;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: auto;
    }

    .lista-de-menus h1 {
        font-size: 2rem;
        color: #FEFAE0;
        margin-bottom: 10px;
    }

    .lista-de-menus a {
        font-size: 1.2rem;
        text-decoration: none;
        color: #9CA986;
        background-color: #fff;
        padding: 10px;
        margin: 10px 0;
        width: 100%;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        transition: background-color 0.3s ease;
    }

    .lista-de-menus a:hover {
        background-color: #cad2bc;
        color: #fff;
    }

    hr {
        width: 80%;
        border: 0;
        border-top: 2px solid #eee;
        margin: 20px 0;
    }
</style>


<x-nav-menu/>

<div class="lista-de-menus">
    <h1>Menus disponíveis</h1>
    <hr>

    @foreach($menus as $menu)
        <a href="/menu/{{ $menu->id }}">{{ $menu->descricao }}</a>
    @endforeach
</div>
