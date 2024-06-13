<?php
include("conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $genero = $_POST['genero'];

    $stmt = $pdo->prepare('INSERT INTO tbgenero(genero) VALUES (?)');
    $stmt->execute([$genero]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | Gênero Literário</title>
    <link rel="shortcut icon" href="..\img\livros.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <h3 class="fs-3 text-uppercase text-center" style="color: white;">CADASTRAR GÊNERO LITERÁRIO</h3>
    </header>

    <div class="d-flex justify-content-center banner">
        <div class="card d-flex justify-content-center">
            <div class="card-header font-monospace">
                CADASTRO DE GÊNERO LITERÁRIO
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-bookmark-check"></i></span>
                        <input type="text" class="form-control font-monospace" placeholder="Gênero Literário" aria-label="Username" aria-describedby="addon-wrapping" name="genero" required>
                    </div>

                    <input type="submit" value="CADASTRAR GÊNERO LITERÁRIO" class="btn btn-outline-primary">
                </form>
            </div>
        </div>
    </div>

    <footer class=" d-flex justify-content-center">
        <br><a class="btnVoltar btn btn-outline-primary" href="index.php">VOLTAR PARA O CRUD DE LIVROS</a>
    </footer>

</body>

</html>