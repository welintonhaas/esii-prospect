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
   public function testIncluirProspect(){
      $daoProspect = new DAOProspect();
      try{
         $this->assertEquals(
            TRUE,
            $daoProspect->incluirProspect("Welinton Haas", "welinton@gmail.com", "(49)99992-1631", "@facebookWelinton", "999921631")
         );
         unset($daoProspect);
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }

  
}
?>