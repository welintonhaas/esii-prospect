<?php
require_once('ControllerProspect.php');
use controller\ControllerProspect;

session_start();

if(isset($_POST['nome'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $whatsapp = $_POST['whatsapp'];
    $facebook = $_POST['facebook'];

    $cProspect = new ControllerProspect();

    try{
        $cProspect->salvarProspect($nome, $email, $celular, $facebook, $whatsapp);
        unset($cProspect);
        $_SESSION['status'] = "Prospect Cadastrado com sucesso!";
        header("Location: ../../views/Prospect/v_listar_prospect.php");
    }catch(Exception $e){
        $_SESSION['erroNovoUsuario'] = $e->getMessage();
        unset($cUsuario);
        header("Location: /../views/Usuario/v_incluir_usuario.php");
    }

}else{
    $_SESSION['erroLogin'] = "Faça o login para entrar no sistema!";
    header("Location: ../../index.php");
}