<?php
namespace tests;

require_once('../uteis/vendor/autoload.php');
require_once('../models/Prospect.php');
require_once('../DAO/DAOProspect.php');

use PHPUnit\Framework\TestCase;
use models\Prospect;
use dao\DAOProspect;

class ProspectTest extends TestCase{

   /** @test */
   public function testExcluirProspect(){
      $daoProspect = new DAOProspect();
      try{
         $this->assertEquals(
            TRUE,
            $daoProspect->excluirProspect(43)
         );
         unset($daoProspect);
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }

   /** @test */
   public function testIncluirProspect(){
      $daoProspect = new DAOProspect();
      try{
         $this->assertEquals(
            TRUE,
            $daoProspect->incluirProspect("Teste Haas", "um@gmail.com", "(49)21231231", "@facebookWelinton", "999921631")
         );
         unset($daoProspect);
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }

    /** @test */
    public function testAtualizarProspect(){
      $daoProspect = new DAOProspect();
      try{
         $this->assertEquals(
            TRUE,
            $daoProspect->atualizarProspect(31, "outro", "outro@gmail.com", "1111111111", "@facebookoutro", "222222222")
         );
         unset($daoProspect);
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }

   /** @test */
   public function testBuscarProspect(){
      $daoProspect = new DAOProspect();
      try{
         $this->assertEquals(
            "Gervasio Nunes",
            $daoProspect->buscarProspect("gernunes@hotmail.com")
         );
         unset($daoProspect);
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }

  

  
}
?>