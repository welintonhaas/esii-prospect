<?php
require_once('../models/Usuario.php');
use models\Usuario;
session_start();

if(isset($_SESSION['usuario'])){ 

        # Deslogar
        if(isset($_POST['sair'])){
            session_destroy();
            header("Location: ../index.php");
        }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bem Vindo ao Sistema</title>
        <link rel="stylesheet" type="text/css" href="libs/bootstrap/css/bootstrap.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="textoNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(Página atual)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Prospect/v_listar_prospect.php">Prospects</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    Bem vindo: 
                    <?php 
                    
                        $usuario = unserialize($_SESSION['usuario']);
                        echo $usuario->nome; 
                    ?>
                </span>
                <form action="main.php" method="POST">
                    <input name="sair" type="hidden">
                    <button type="submit" class="btn">Sair</button>
                </form>
            </div>
        </nav>
        </header>

    </body>
</html>
<?php
}else{
    $_SESSION['erroLogin'] = "Você precisa fazer login para acessar o sistema";
    header("Location: ../index.php");
}
?>