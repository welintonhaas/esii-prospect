<?php
require_once('ControllerUsuario.php');
use controller\ControllerUsuario;

session_start();

if(isset($_POST['login']) && isset($_POST['senha'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    try{
        $ctrlUsuario = new ControllerUsuario();
        $usuario = $ctrlUsuario->fazerlogin($login, $senha);

        $_SESSION['usuario'] = serialize($usuario);
        header("Location: ../../views/main.php");
    }catch(\Exception $e){
        $_SESSION['erroLogin'] = $e->getMessage();;
        header("Location: ../../index.php");
    }
}else{
    $_SESSION['erroLogin'] = "Você precisa fazer login para acessar o sistema";
    header("Location: ../../index.php");
}

?>