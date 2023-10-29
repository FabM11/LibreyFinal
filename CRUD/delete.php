<?php
include_once('../conexao.php');
?>
<?php
$iddolivro = $_POST['deletar'];



try {
    $deletar = $conexao->query('DELETE FROM livros WHERE id=' . $iddolivro . '');
} catch (Exception $erro) {
    $error = $erro->getMessage();
    echo  '<p>Falha ao deletar no Banco de Dados contate os responsáveis</p>';
    echo '<p>Erro:</p><p>' . $error . '</p>';
    die();
}
header('Location:./php/selecionar.php');