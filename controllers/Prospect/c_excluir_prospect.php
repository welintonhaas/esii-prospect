<?php
require_once('ControllerProspect.php');
use controller\ControllerProspect;

session_start();

if(isset($_GET['cod_prospect'])){
    
    $cod_prospect = $_GET['cod_prospect'];
    $cProspect = new ControllerProspect();

    try{
        $cProspect->eliminarProspect($cod_prospect);
        unset($cProspect);
        $_SESSION['status'] = "Prospect Excluido com sucesso!";
        header("Location: ../../views/Prospect/v_listar_prospect.php");
    }catch(Exception $e){
        $_SESSION['status'] = $e->getMessage();
        unset($cUsuario);
        header("Location: ../../views/Prospect/v_listar_prospect.php");
    }

}else{
    $_SESSION['erroLogin'] = "Faça o login para entrar no sistema!";
    header("Location: ../../index.php");
}