<?php
include_once('../conexao.php');

$sql = "SELECT senha FROM Biblioteca";

$resultado = mysqli_query($conexao, $sql);


if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    if ($username === 'escola@gmail.com' && $password === '123') {
        header('Location:./cadastrarlivro.php');
    } else {
        echo 'Login inválido. Tente novamente.';
    }
}