<?php
include("conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nomeLivro = $_POST['nomeLivro'];
    $anoLancamento = $_POST['anoLancamento'];

    $stmt = $pdo->prepare('UPDATE tblivro SET nomeLivro = ?, anoLancamento = ? WHERE codLivro = ?');
    $stmt->execute([$nomeLivro, $anoLancamento, $id]);

    header('Location: index.php');
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM tbLivro WHERE codLivro = ?');
$stmt->execute([$id]);
$Livro = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro</title>
    <link rel="shortcut icon" href="..\img\livros.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h3 class="fs-3 text-uppercase text-center" style="color: white;">EDITAR LIVRO</h3>
    </header>

    <div class="d-flex justify-content-center banner">
        <div class="card d-flex justify-content-center">
            <div class="card-header font-monospace">
                EDIÇÃO DO LIVRO
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $Livro['codLivro']; ?>">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-book"></i></span>
                        <input type="text" class="form-control font-monospace" placeholder="Nome do Livro" aria-label="Username" aria-describedby="addon-wrapping" name="nomeLivro" value="<?php echo $Livro['nomeLivro']; ?>" required>
                    </div>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-calendar-check"></i></span>
                        <input type="number" class="form-control font-monospace ano" placeholder="Ano do Lançamento" aria-label="Username" aria-describedby="addon-wrapping" name="anoLancamento" value="<?php echo $Livro['anoLancamento']; ?>" required>
                    </div>

                    <input type="submit" value="ATUALIZAR O LIVRO" class="btn btn-outline-primary">
                </form>
            </div>
        </div>
    </div>

    <footer class=" d-flex justify-content-center">
        <br><a class="btnVoltar btn btn-outline-primary" href="index.php">VOLTAR PARA O CRUD DE LIVROS</a>
    </footer>

</body>

</html>