<?php
session_start();
require('bd.php');
$login = $_POST['login'];
$password = $_POST['password'];
$query = "SELECT * FROM accounts Where login='$login' and password='$password';";
$result = mysqli_query($link,$query) or die(mysqli_error($link));
$count = mysqli_num_rows($result);

if($count == 1)
{
    $_SESSION['login'] = $login;
    header('Location: http://localhost');
    exit;
}
else {
    echo $login;
    echo '<br>';
    echo $password;
    echo '<br>';
    echo 'ERROR';
}

?>