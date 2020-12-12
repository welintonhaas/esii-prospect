<?php

require_once('../../models/Usuario.php');
require_once('../../controllers/Prospect/ControllerProspect.php');
use models\Usuario;
use controller\ControllerProspect;

session_start(); 

$prospects = new ControllerProspect;
$lProspcts = $prospects->exibirProspects();

?>
<!DOCTYPE html>
<html>
<!-- Tratando erros com sessão -->
    <head>
        <title>Bem Vindo ao Sistema</title>
        <link rel="stylesheet" type="text/css" href="../libs/bootstrap/css/bootstrap.css">
        <style type="text/css">
            .table-overflow {
                max-height:600px;
                overflow-y:auto;
            }
        </style>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="collapse navbar-collapse" id="textoNavbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link " href="../main.php">Home <span class="sr-only">(Página atual)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Prospects</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        Bem vindo: 
                        <?php 
                            $usuario = unserialize($_SESSION['usuario']);
                            echo $usuario->nome; 
                        ?>
                    </span>
                </div>
            </nav>
        </header><br>
        <div class="container">
            <?php if(isset($_SESSION['status'])){ ?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['status']; ?>
                </div>
                <?php unset($_SESSION['status']); ?>
            <?php } ?>
            <div class="table">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Facebook</th>
                            <th scope="col">Whatsapp</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($lProspcts as $p){ ?>
                        <tr>
                            <th scope="col"><?= $p['nome'] ?></th>
                            <th scope="col"><?= $p['email'] ?></th>
                            <th scope="col"><?= $p['celular'] ?></th>
                            <th scope="col"><?= $p['facebook'] ?></th>
                            <th scope="col"><?= $p['whatsapp'] ?></th>
                            <th scope="col">
                                <button class="btn btn-primary"><a class="text-white" href="v_alterar_prospect.php?cod_prospect=<?= $p['cod_prospect']?>">Editar</a></button>
                                <button class="btn btn-danger" ><a class="text-white" href="../../controllers/Prospect/c_excluir_prospect.php?cod_prospect=<?= $p['cod_prospect']?>">Excluir</a></button>
                            </th>
                        </tr>
                     <?php } ?>
                    </tbody>
                </table>
            </div>
                        
            <div>
                <a class="btn btn-primary" href="v_incluir_prospect.php">Cadastrar Novo</a>
            </div>
        </div>
    </body>
</html>