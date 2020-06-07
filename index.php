<?php
session_start();

if(isset($_SESSION['id']) && $_SESSION['id']!=null){
  echo  "<h1>Login Efetuado com sucesso</h1>";
}else {
    header("Location: login.php");
}




?>
