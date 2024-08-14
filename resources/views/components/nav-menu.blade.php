<style>

    nav {
        display: flex;
        justify-content: center;
        font-size: 25px;
        gap: 60px;
        align-items: center;
    }

    nav > a {
        position: relative;
        cursor: pointer;
        text-decoration: none;
        color: #9CA986;
    }

    nav > a::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -5px;
        width: 0;
        height: 2px;
        background-color: #bec9af;
        transition: width 0.3s ease-in-out;
    }

    nav > a:hover::after {
        width: 100%;
    }

    .titulo-masterchester {
        color: #9CA986;
        text-align: center;
        font-size: 60px;
    }

    .titulo-span-masterchester {
        color: #CCD5AE;
    }


</style>

<nav>
    <a href="/cozinheiro">Cozinheiros</a>

    <h1 class="titulo-masterchester">Master<span class="titulo-span-masterchester">Chester</span></h1>

    <a href="/menu">Menus</a>
</nav>
