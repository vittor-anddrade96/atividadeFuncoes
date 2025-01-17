<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produtos = $_POST['produtos'];
    $precos = $_POST['precos'];

    function contarProdutosBaratos($precos) {
        return count(array_filter($precos, function($preco) {
            return $preco < 50;
        }));
    }

    function produtosEntre50e100($produtos, $precos) {
        $result = [];
        foreach ($precos as $index => $preco) {
            if ($preco >= 50 && $preco <= 100) {
                $result[] = $produtos[$index];
            }
        }
        return $result;
    }

    function mediaProdutosCaros($precos) {
        $caros = array_filter($precos, function($preco) {
            return $preco > 100;
        });
        if (count($caros) === 0) {
            return 0;
        }
        return array_sum($caros) / count($caros);
    }

    $quantidadeBaratos = contarProdutosBaratos($precos);
    $produtos50a100 = produtosEntre50e100($produtos, $precos);
    $mediaCaros = mediaProdutosCaros($precos);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
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

        .produto {
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="number"] {
            width: calc(50% - 10px);
            padding: 10px;
            margin-right: 10px;
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
        <h1>Cadastro de Produtos</h1>
        <?php if ($_SERVER["REQUEST_METHOD"] != "POST"): ?>
        <form action="" method="POST">
            <div class="produto">
                <input type="text" name="produtos[]" placeholder="Nome do Produto" required>
                <input type="number" name="precos[]" placeholder="Preço do Produto" step="0.01" required>
            </div>
            <div class="produto">
                <input type="text" name="produtos[]" placeholder="Nome do Produto" required>
                <input type="number" name="precos[]" placeholder="Preço do Produto" step="0.01" required>
            </div>
            <div class="produto">
                <input type="text" name="produtos[]" placeholder="Nome do Produto" required>
                <input type="number" name="precos[]" placeholder="Preço do Produto" step="0.01" required>
            </div>
            <div class="produto">
                <input type="text" name="produtos[]" placeholder="Nome do Produto" required>
                <input type="number" name="precos[]" placeholder="Preço do Produto" step="0.01" required>
            </div>
            <div class="produto">
                <input type="text" name="produtos[]" placeholder="Nome do Produto" required>
                <input type="number" name="precos[]" placeholder="Preço do Produto" step="0.01" required>
            </div>
            <button type="submit">Enviar</button>
        </form>
        <?php else: ?>
            <h1>Resultados</h1>
            <p>Quantidade de produtos com preço inferior a R$50,00: <strong><?php echo $quantidadeBaratos; ?></strong></p>
            <p>Produtos com preço entre R$50,00 e R$100,00: <strong><?php echo implode(", ", $produtos50a100); ?></strong></p>
            <p>Média dos preços dos produtos com preço superior a R$100,00: <strong>R$<?php echo number_format($mediaCaros, 2, ',', '.'); ?></strong></p>
        <?php endif; ?>
    </div>
</body>
</html>
