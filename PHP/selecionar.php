<link rel="stylesheet" href="../.css">

<?php
include_once('../conexao.php');
?>

<?php
$path = '..';
include_once('../principal/header.php')
?>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Librey</a>
  </div>
</nav>
<?php
$sql = "SELECT * FROM Livros";

$resultado = mysqli_query($conexao, $sql);

echo '<div class="container mt-3 border-info" style="box-shadow: 0px 11px 100px 94px #D9F7FA;">';
echo '<div class="row justify-content-evenly">';
if (mysqli_num_rows($resultado) == 0) {
    echo '<p>O banco de dados não tem dados</p>';
} else {
    while ($linha = mysqli_fetch_array($resultado)) {

        echo '<div class="card m-2 border-black border-1 rounded-2 p-2 mb-2 " style="width: 18rem; background:#EDF6FC;">';


        echo '<img  src="../image/' . $linha['nome_arquivo'] . '" class="card-img-top h-50 w-auto" alt="...">';

        echo '<div class="card-body shadow p-3 mb-5 bg-body-tertiary rounded">';
        echo '<h5 class="card-title" style="text-decoration:underline;">' . $linha['titulo'] . '</h5>';
        echo '<p>Classificação Indicativa: ' . $linha['classificacao_indicativa'] . '</p>';
        echo '<p>Autor: ' . $linha['autor'] . '</p>';
        echo '<p>Editora:</p>';
        echo '<p  class="text-wrap">' . $linha['editora'] . '</p>';
        echo '<form action="../CRUD/delete.php" method="post" > 

          <button class="btn btn-sm btn-primary"name="deletar" value="' . $linha['id'] . '" 
          type="submit" class="border border-0 m-0 p-0 text-primary">Deletar</button>
          </form>';

        echo '</div>';
        echo '</div>';
    }
}

echo '</div>';
echo '</div>';
echo '<br>';

echo '<div class="botoes">';
echo '<button type="button" class="btn1">voltar</button>';
echo '<button type="button" class="btn1">proximo</button>';
echo '</div>';


?>
<a href="../pages/entrar.html">Cadastrar</a>
<?php
include_once('../principal/footer.php');
?>


</script>
<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
    </div>
</div>
<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
<script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
</script>