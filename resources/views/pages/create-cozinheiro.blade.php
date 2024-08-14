<div>
    <h1>Criar Novo Cozinheiro</h1>

    <form action="/cozinheiro/create" method="POST">
        @csrf
        <div>
            <label for="nome">Nome do Cozinheiro:</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>
            <label for="idade">Idade do Cozinheiro:</label>
            <input type="text" id="idade" name="idade" value="{{ old('idade') }}" required>
            <label for="tempo_carreira">Tempo de carreira do Cozinheiro:</label>
            <input type="number" id="tempo_carreira" name="tempo_carreira" value="{{ old('tempo_carreira') }}" required>
        </div>

        <div>
            <button type="submit">Criar Cozinheiro</button>
        </div>
    </form>
</div>
