<?php
include_once('./conexao.php')
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".\vendor\twbs\bootstrap\dist\css\bootstrap.css">
    
    <title>Teste</title>
</head>
<body>

<?php
header('Location:./PHP/selecionar.php');
/*$sql = "SELECT Alunos.nome AS nome_aluno, Alunos.sala, Alunos.RA, Livros.titulo, IF(Alunos.id_livro_emprestado IS NULL, 'Não', 'Sim') as Emprestado FROM Livros LEFT JOIN Alunos ON Alunos.id_livro_emprestado = Livros.id";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
  // Mostra os dados de cada linha
  while($row = $result->fetch_assoc()) {
    echo "<div class='card' style='width: 18rem;'>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>" . $row["titulo"] . "</h5>";
    echo "<p class='card-text'>Emprestado: " . $row["Emprestado"] . "</p>";
    if ($row["Emprestado"] == 'Sim') {
      echo "<p class='card-text'>Nome do Aluno: " . $row["nome_aluno"] . "</p>";
      echo "<p class='card-text'>Sala: " . $row["sala"] . "</p>";
      echo "<p class='card-text'>RA: " . $row["RA"] . "</p>";
    }
    echo "</div>";
    echo "</div>";
  }
} else {
  echo "0 resultados";
}*/
?>



<script src=".\vendor\twbs\bootstrap\dist\js\bootstrap.bundle.js"></script>
</body>
</html>