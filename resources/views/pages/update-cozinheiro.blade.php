<div>
    <h1>Atualizar Cozinheiro</h1>

    <form action="/cozinheiro/{{ $cozinheiro->id }}/edit" method="POST">
        @csrf
        <div>
            <label for="nome">Nome do Cozinheiro:</label>
            <input type="text" id="nome" name="nome" value="{{ $cozinheiro->nome }}" required>
            <label for="idade">Idade do Cozinheiro:</label>
            <input type="text" id="idade" name="idade" value="{{ $cozinheiro->idade }}" required>
            <label for="tempo_carreira">Tempo de carreira do Cozinheiro:</label>
            <input type="number" id="tempo_carreira" name="tempo_carreira" value="{{ $cozinheiro->tempo_carreira }}" required>
        </div>

        <div>
            <button type="submit">Atualizar Cozinheiro</button>
        </div>
    </form>
</div>
