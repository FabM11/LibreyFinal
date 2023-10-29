<?php
include_once('../conexao.php');

try {
    $conexao = new mysqli($host, $user, $password, $database);
} catch (Exception $erro) {
    $error = $erro->getMessage();
    echo  '<p>Falha ao conectar ao Banco de Dados contate os responsáveis</p>';
    echo '<p>Erro:</p><p>' . $opa . '</p>';
    $conn->close();
    die();
}

/*error_reporting(0);
$msg = '';*/

if (isset($_POST['send'])) {
    $nomedolivro = $_POST['nome'];
    $autor = $_POST['autor'];
    $classificacaoIndicativa = $_POST['idade'];
    $editora = $_POST['editora'];
    $isbn = $_POST['isbn'];
    $img = $_POST['file'];

    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "../image/" . $filename;

    // Primeiro, verifique se o livro já existe
    $ChecarSQL = "SELECT * FROM `livros` WHERE `isbn` = ?";
    $ChecarStatement = $conexao->prepare($ChecarSQL);
    $ChecarStatement->bind_param('s', $isbn);
    $ChecarStatement->execute();
    $ChecarResultado = $ChecarStatement->get_result();

    if ($ChecarResultado->num_rows > 0) {
        // O livro já existe, então atualize a quantidade
        $updateSql = "UPDATE `livros` SET `quantidade` = `quantidade` + 1 WHERE `isbn` = ?";
        $updateStmt = $conexao->prepare($updateSql);
        $updateStmt->bind_param('s', $isbn);
        $updateStmt->execute();
    } else {
        // O livro não existe, então insira um novo registro
        $insertSql = "INSERT INTO `livros`(`titulo`, `autor`, `isbn`, `nome_arquivo`, `classificacao_indicativa`, `editora`, `quantidade`) VALUES (?, ?, ?, ?, ?, ?, 1)";
        $insertStmt = $conexao->prepare($insertSql);
        $insertStmt->bind_param('ssssss', $nomedolivro, $autor, $isbn, $filename, $classificacaoIndicativa, $editora);
        $insertStmt->execute();
    }

    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3> Image uploaded successfully!</h3>";
    } else {
        echo "<h3> Failed to upload image!</h3>";
    }
} else {
    echo "<h3> </h3>";
}
?>

<?php
$path = '..';
include_once('../principal/header.php');
?>

<!--
<style>
    body {
        background-color: #c5e9f0;
    }

    form {

        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        border-style: hidden;
        background: rgb(55, 164, 207);
        height: 500px;
        box-shadow: 10px blue;
        gap: 10px;


    }

    input {
        height: 2em;
        font-size: 15px;
    }

    h1 {
        text-decoration: underline;
        text-align: center;
    }

    label {
        font-size: 20px;
        font-family: Arial;
    }

    button {
        height: 3em;
        width: 200px;
    }
</style>
-->

<form action="" method="post" enctype="multipart/form-data" class="w-50">


  <div class="mb-3">
    <label for="Nome" class="form-label">Nome do livro:</label>
    <input type="text" placeholder="nome" name="nome" id="Nome" class="form-control">
    <div id="emailHelp" class="form-text"></div>
  </div>

  <div class="mb-3">
    <label for="Autor" class="form-label">Autor do livro:</label>
    <input type="text" placeholder="autor" name="autor" id="Autor" class="form-control">
  </div>

  <div class="mb-3">
    <label for="Idade" class="form-label">Classificação indicativa:</label>
    <input type="text" placeholder="idade" name="idade" id="Idade" class="form-control">
  </div>

  <div class="mb-3">
    <label for="Editora" class="form-label">Editora:</label>
    <input type="text" placeholder="editora" name="editora" id="Editora" class="form-control">
  </div>

  <div class="mb-3">
    <label for="ISBN" class="form-label">ISBN:</label>
    <input type="text" placeholder="1234567891011" name="isbn" id="ISBN" class="form-control" maxlength="13">
  </div>
  
  <div class="form-group">
    <input class="form-control" type="file" name="file" id="file">
  </div>

    <button type="submit" class="btn btn-primary my-3">cadastrar</button>
</form>

<?php
include_once('../principal/footer.php');
?>

    <?php

    ?>
    </div>
    </script>
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>

        <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
        <script>
            new window.VLibras.Widget('https://vlibras.gov.br/app');
        </script>