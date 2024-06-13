<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | Livros</title>
    <link rel="shortcut icon" href="..\img\livros.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h3 class="fs-3 text-uppercase text-center" style="color: white;">CRUD de Livros</h3>
    </header>

    <div class="d-flex justify-content-evenly">
        <a href="cadastroLivro.php" class="btn btn-outline-primary">ADICIONAR LIVRO</a>
        <a href="buscaLivro.php" class="btn btn-outline-primary">PESQUISAR LIVRO</a>
        <a href="buscarCodigo.php" class="btn btn-outline-primary">PESQUISAR CÓDIGO</a>
    </div>

    <div class="d-flex justify-content-center" style="margin-top: 30px;">

        <table>
            <tr>
                <th style='text-align: center;'>CÓDIGO</th>
                <th style='text-align: center;'>NOME DO LIVRO</th>
                <th style='text-align: center;'>LANÇAMENTO</th>
                <th style='text-align: center;'>AÇÕES</th>
            </tr>
            <?php
            
                include("conn.php");
                $stmt = $pdo->query("SELECT * FROM tbLivro");
                while ($row = $stmt->fetch()) {
                    echo"<tr>";
                    echo "<td style='text-align: center;'>{$row['codLivro']}</td>";
                    echo "<td style='width: 300px;'>{$row['nomeLivro']}</td>";
                    echo "<td style='text-align: center;'>{$row['anoLancamento']}</td>";
                    echo"<td>
                        <a style='color: black;' href='editar.php?id={$row['codLivro']}'>EDITAR</a> <span style='font-weight: bold; color: #0c2077;'>  |  </span>
                        <a style='color: black;' href='excluir.php?id={$row['codLivro']}'>EXCLUIR</a>
                        </td>";
                    echo"</tr>";
                }
            ?>
        </table>
    </div>

    <footer class=" d-flex justify-content-center">
        <br><a class="btnVoltar btn btn-outline-primary" href="\livros\index.php">VOLTAR PARA O MENU</a>
    </footer>
    
</body>
</html>