<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Bd2504204";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT * FROM tbAutor";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Autor | Nome</title>
    <link rel="shortcut icon" href="..\img\livros.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <h3 class="fs-3 text-uppercase text-center" style="color: white;">PESQUISAR AUTOR PELO NOME</h3>
    </header>

    <div class="buscarLivro">

        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-search"></i></span>
            <input type="text" class="form-control font-monospace" id="busca" placeholder="Escreva o nome do autor que deseja pesquisar..." aria-label="Username" aria-describedby="addon-wrapping" required>
        </div>

        <table id="tabela">
            <tr>
                <th style='text-align: center; text-transform: uppercase;'>Código</th>
                <th style='text-align: center; text-transform: uppercase;'>NOME DO AUTOR</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td style='text-align: center; width: 100px;'>" . $row["codAutor"] . "</td>";
                    echo "<td  style='width: 400px;'>" . $row["nomeAutor"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>AUTOR NÃO ENCONTRADO</td></tr>";
            }
            ?>
        </table>

        <script>
            document.getElementById("busca").addEventListener("input", function() {
                var input = this.value.toLowerCase();
                var tabela = document.getElementById("tabela");
                var linhas = tabela.getElementsByTagName("tr");
                for (var i = 1; i < linhas.length; i++) {
                    var texto = linhas[i].innerText.toLowerCase();
                    linhas[i].style.display = texto.indexOf(input) === -1 ? "none" : "table-row";
                }
            });
        </script>
    </div>

    <footer class=" d-flex justify-content-center">
        <a class="btnVoltar btn btn-outline-primary" href="index.php">VOLTAR PARA O CRUD DE AUTORES</a>
    </footer>

</body>

</html>

<?php
$conn->close();
?>