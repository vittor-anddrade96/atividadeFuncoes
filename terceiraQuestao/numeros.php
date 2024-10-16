<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeros = $_POST['numeros'];

    $quantidadeNegativos = 0;
    $quantidadePositivos = 0;
    $quantidadePares = 0;
    $quantidadeImpares = 0;

    foreach ($numeros as $numero) {
        if ($numero < 0) {
            $quantidadeNegativos++;
        } else {
            $quantidadePositivos++;
        }
        
        if ($numero % 2 == 0) {
            $quantidadePares++;
        } else {
            $quantidadeImpares++;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Números</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
        }

        .numero {
            margin-bottom: 15px;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastro de Números</h1>
        <?php if ($_SERVER["REQUEST_METHOD"] != "POST"): ?>
        <form action="" method="POST">
            <?php for ($i = 0; $i < 10; $i++): ?>
            <div class="numero">
                <input type="number" name="numeros[]" placeholder="Número <?php echo $i + 1; ?>" required>
            </div>
            <?php endfor; ?>
            <button type="submit">Enviar</button>
        </form>
        <?php else: ?>
            <h1>Resultados</h1>
            <p>Quantidade de números negativos: <strong><?php echo $quantidadeNegativos; ?></strong></p>
            <p>Quantidade de números positivos: <strong><?php echo $quantidadePositivos; ?></strong></p>
            <p>Quantidade de números pares: <strong><?php echo $quantidadePares; ?></strong></p>
            <p>Quantidade de números ímpares: <strong><?php echo $quantidadeImpares; ?></strong></p>
        <?php endif; ?>
    </div>
</body>
</html>
