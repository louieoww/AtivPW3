<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Produto</title>
</head>
<body>
    <h1>Criar Novo Produto</h1>

    <!-- Formulário de criação -->
    <form action="{{ route('products.store') }}" method="POST">
        @csrf <!-- Token de proteção contra CSRF -->

        <label for="aquarium_model">Modelo do Aquário:</label>
        <input type="text" name="aquarium_model" id="aquarium_model" required>
        <br><br>

        <label for="size">Tamanho (em metros):</label>
        <input type="number" step="0.01" name="size" id="size" required>
        <br><br>

        <label for="water_capacity">Capacidade de Água (em litros):</label>
        <input type="number" step="0.01" name="water_capacity" id="water_capacity" required>
        <br><br>

        <button type="submit">Criar Produto</button>
    </form>
</body>
</html>