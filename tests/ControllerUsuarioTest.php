<?php

namespace tests;

require_once('../uteis/vendor/autoload.php');
require_once('../models/Usuario.php');
require_once('../controllers/Usuario/ControllerUsuario.php');

use PHPUnit\Framework\TestCase;
use models\Usuario;
use controller\ControllerUsuario;

class ControllerUsuarioTest extends TestCase{
    /** @test */
    public function testLogar(){
        $ctrlUsuario = new ControllerUsuario();
        $usuario = new Usuario();

        try{
            $usuario->addUsuario('paulo','Paulo Cordova', 'paulo.cdv@gmail.com','(49)99996-5582', TRUE);

            $this->assertEquals(
                $usuario,
                $ctrlUsuario->fazerLogin('paulo','123')
            );

        }catch(\Exception $e){
            $this->fail($e->getMessage());
        }
        unset($usuario);
        unset($daoUsuario);
    }

    /** @teste */
    public function testIncluirUsuario(){
        $ctrlUsuario = new ControllerUsuario();

        try{
            $this->assertEquals(
                true,
                $ctrlUsuario->salvarUsuario('Leandro Machado', 'leandro@gmail.com','(49)9999-2222','leandro','abc')
            );

        }catch(\Exception $e){
            $this->fail($e->getMessage());
        }
    }
}



?>