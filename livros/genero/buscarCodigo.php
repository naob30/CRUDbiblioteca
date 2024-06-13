<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Bd2504204";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

function buscarDados($termo)
{
    global $conn;
    $sql = "SELECT * FROM tbgenero WHERE codGenero LIKE '%$termo%'";
    $result = $conn->query($sql);
    return $result;
}

$resultado = null;


if (isset($_POST['buscar'])) {
    $termo = $_POST['termo'];
    $resultado = buscarDados($termo);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Gênero | Código</title>
    <link rel="shortcut icon" href="..\img\livros.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <h3 class="fs-3 text-uppercase text-center" style="color: white;">PESQUISAR GÊNERO PELO CÓDIGO</h3>
    </header>

    <div class="buscarCodigo">

        <form method="post">
            <div class="input-group flex-nowrap">
                <!-- <span class="input-group-text" id="addon-wrapping"><i class="bi bi-bookmark-check"></i></span> -->
                <input type="number" id="termo" name="termo" class="form-control font-monospace" id="busca" placeholder="Escreva o código do gênero que deseja pesquisar..." aria-label="Username" aria-describedby="addon-wrapping" required>
                <button type="submit" name="buscar" id="addon-wrapping" class="input-group-text btn btn-outline-primary">BUSCAR</button><br><br>
            </div>
        </form>

        <table>
            <tr>
                <th style='text-align: center; text-transform: uppercase;'>Código</th>
                <th style='text-align: center; text-transform: uppercase;'>Gênero Literário</th>
            </tr>

            <?php
            if ($resultado && $resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td style='text-align: center; width: 50px;'>" . $row["codGenero"] . "</td>";
                    echo "<td style='width: 300px;'>" . $row["genero"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<span style='text-align: center; font-weight: bold;'>CÓDIGO NÃO ENCONTRADO</span>";
                include("conn.php");
                $stmt = $pdo->query("SELECT * FROM tbGenero");
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td style='text-align: center; width: 50px;'>{$row['codGenero']}</td>";
                    echo "<td style='width: 800px;'>{$row['genero']}</td>";
                    echo "</tr>";
                }
                // echo "<tr><td colspan='3'>Nenhum resultado encontrado</td></tr>";
            }
            ?>
        </table>
    </div>


    <footer class=" d-flex justify-content-center">
        <a class="btnVoltar2 btn btn-outline-primary" href="index.php">VOLTAR PARA O CRUD DE GÊNEROS LITERÁRIOS</a>
        <a class="btnVoltar2 btn btn-outline-primary" href="buscarCodigo.php">NOVA CONSULTA</a>
    </footer>


</body>

</html>

<?php
$conn->close();
?>