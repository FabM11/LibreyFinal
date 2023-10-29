<?php
$database = 'librey';
$password = '';
$user = 'root';
$host = 'localhost';

try {
    $conexao = new mysqli($host, $user, $password, $database);
} catch (Exception $erro) {
    $error = $erro->getMessage();
    echo  '<p>Falha ao conectar ao Banco de Dados contate os responsáveis</p>';
    echo '<p>Erro:</p><p>' . $error . '</p>';
    die();
}
?>