<?php
namespace tests;

require_once('../uteis/vendor/autoload.php');
require_once('../models/Usuario.php');
require_once('../DAO/DAOUsuario.php');

use PHPUnit\Framework\TestCase;
use models\Usuario;
use dao\DAOUsuario;

class UsuarioTest extends TestCase{

   /** @test */
   public function testIncluirUsuario(){
      $daoUsuario = new DAOUsuario();
      try{
         $this->assertEquals(
            TRUE,
            $daoUsuario->incluirUsuario("Pedro Carvalho", "pedro@gmail.com", "(49)98855-1122", "pedro", "789")
         );
         unset($daoUsuario);
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }

   /** @test */
   public function testLogar(){
      $daoUsuario = new DAOUsuario();
      $usuario = new Usuario();
      try{
         $usuario->addUsuario("pedro", "Pedro Carvalho", "pedro@gmail.com", "(49)98855-1122", TRUE);
         $this->assertEquals(
            $usuario,
            $daoUsuario->logar('pedro', '789')
         );
      }
      catch(\Exception $e){
         $this->fail($e->getMessage());
      }
      unset($usuario);
      unset($daoUsuario);
   }
}
?>