<?php

namespace tests;

require_once('../uteis/vendor/autoload.php');
require_once('../models/Prospect.php');
require_once('../controllers/Prospect/ControllerProspect.php');

use PHPUnit\Framework\TestCase;
use models\Prospect;
use controller\ControllerProspect;

class ControllerProspectTest extends TestCase{

    /** @teste */
    public function testIncluirProspect(){
        $ctrlProspect = new ControllerProspect();

        try{
            $this->assertEquals(
                true,
                $ctrlProspect->salvarProspect("wel wel ", "dois@gmail.com", "(49)2123421231", "@facebooksss", "93439921631")
            );

        }catch(\Exception $e){
            $this->fail($e->getMessage());
        }
    }

    /** @teste */
    public function testAtualizarProspect(){
        $ctrlProspect = new ControllerProspect();

        try{
            $this->assertEquals(
                true,
                $ctrlProspect->alterarProspect(31, "Marceneiro", "mr@gmail.com", "(49)2123421231", "@facebooksss", "93439921631")
            );

        }catch(\Exception $e){
            $this->fail($e->getMessage());
        }
    }

    /** @teste */
    public function testExcluirProspect(){
        $ctrlProspect = new ControllerProspect();

        try{
            $this->assertEquals(
                true,
                $ctrlProspect->eliminarProspect(59)
            );

        }catch(\Exception $e){
            $this->fail($e->getMessage());
        }
    }

    /** @teste */
    public function testBuscarProspect(){
        $ctrlProspect = new ControllerProspect();

        try{
            $this->assertEquals(
                'Gervasio Nunes',
                $ctrlProspect->econtrarProspect('gernunes@hotmail.com')
            );

        }catch(\Exception $e){
            $this->fail($e->getMessage());
        }
    }
}

?>