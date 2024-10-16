<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomes = $_POST['nomes'];
    $notas = $_POST['notas'];

    $somaNotas = array_sum($notas);
    $mediaNotas = $somaNotas / count($notas);

    $maiorNota = max($notas);
    $indiceMaiorNota = array_search($maiorNota, $notas);
    $alunoMaiorNota = $nomes[$indiceMaiorNota];
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
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

        .aluno {
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
        <h1>Cadastro de Alunos</h1>
        <?php if ($_SERVER["REQUEST_METHOD"] != "POST"): ?>
        <form action="" method="POST">
            <?php for ($i = 0; $i < 10; $i++): ?>
            <div class="aluno">
                <input type="text" name="nomes[]" placeholder="Nome do Aluno" required>
                <input type="number" name="notas[]" placeholder="Nota do Aluno" step="0.01" required min="0" max="10">
            </div>
            <?php endfor; ?>
            <button type="submit">Enviar</button>
        </form>
        <?php else: ?>
            <h1>Resultados</h1>
            <p>Média de notas da classe: <strong><?php echo number_format($mediaNotas, 2, ',', '.'); ?></strong></p>
            <p>Aluno com a maior nota: <strong><?php echo $alunoMaiorNota; ?> (<?php echo $maiorNota; ?>)</strong></p>
        <?php endif; ?>
    </div>
</body>
</html>
