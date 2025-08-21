<?php
session_start();
session_destroy();

echo 'Logout efetuado com sucesso!';
header('location: login.php');
?>