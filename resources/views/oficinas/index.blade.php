<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oficina - Laravel</title>
</head>
<body>
    
    <h1>Oficinas:</h1>

    <form action="/oficinas" method="post">
        @csrf

        <label>Nome Oficina: </label>
        <input type="text" id="nome_oficina" name="nome_oficina" required> <br><br>

        <label>Professor Res: </label>
        <input type="text" id="professor_responsavel" name="professor_responsavel" required> <br><br>

        <label>Carga Horaria: </label>
        <input type="number" id="carga_horaria" name="carga_horaria" required> <br><br>

        <label>Turno: </label>
        <input type="text" id="turno" name="turno" required> <br><br>

        <button type="submit">Salvar</button>

    </form>

    <h2>Lista de Produtos</h2>
    @if($oficinas->isEmpty())
        <p>Nenhuma Oficina cadastrado</p>
    @else
        <ul>
            @foreach($oficinas as $oficina)
                <li>
                    Nome: {{$oficina->nome_oficina}} - Professor Responsavel: {{$oficina->professor_responsavel}} - Carga Horaria: {{$oficina->carga_horaria}} - Turno: {{$oficina->turno}} 
                </li>
            @endforeach
        </ul>
    @endif


</body>
</html>