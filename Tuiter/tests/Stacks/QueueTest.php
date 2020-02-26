<?php

namespace TestTuiter\Stacks;

use \Tuiter\Stacks\Queue;

final class QueueTest extends \PHPUnit\Framework\TestCase {
    public function testClassExists(){
        $this->assertTrue(class_exists("\Tuiter\Stacks\Queue"));
    }
    public function testAgregandoALaCola(){
        $q= new \Tuiter\Stacks\Queue;
        $this->assertTrue($q->put("hola"));
        $this->assertTrue($q->put("que"));
        $this->assertTrue($q->put("mas"));
        $this->assertTrue($q->put("?"));
    }
    public function testAgregandoElmismoALaCola(){
        $q= new \Tuiter\Stacks\Queue;
        $this->assertTrue($q->put("hola"));
        $this->assertTrue($q->put("hola"));
        $this->assertTrue($q->put("hola"));
        $this->assertTrue($q->put("hola"));

        $this->assertTrue($q->put("que"));

        $this->assertTrue($q->put("mas"));
        $this->assertTrue($q->put("mas"));

        $this->assertTrue($q->put("?"));
    }
    public function testBorrandoUno(){
        $q= new \Tuiter\Stacks\Queue;
        $q->put("hola");
        $q->put("que");
        $q->put("mas");
        $q->put("?");
        $this->assertEquals($q->get(),"hola");
    }
    public function testBorrandoVacio(){
        $q= new \Tuiter\Stacks\Queue;
        $q->put("hola");
        $q->put("que");
        $q->put("mas");
        $q->put("?");
        $this->assertEquals($q->get(),"hola");
        $this->assertEquals($q->get(),"que");
        $this->assertEquals($q->get(),"mas");
        $this->assertEquals($q->get(),"?");
        $this->assertFalse($q->get());
    }
    public function testBorrandotodo(){
        $q= new \Tuiter\Stacks\Queue;
        $q->put("hola");
        $q->put("que");
        $q->put("mas");
        $q->put("?");
        $this->assertEquals($q->get(),"hola");
        $this->assertEquals($q->get(),"que");
        $this->assertEquals($q->get(),"mas");
        $this->assertEquals($q->get(),"?");
    }
    public function testTamañoCompleto(){
        $q= new \Tuiter\Stacks\Queue;
        $q->put("hola");
        $q->put("que");
        $q->put("mas");
        $q->put("?");
        $this->assertEquals($q->size(),4);
    }
    public function testTamañoIncompleto(){
        $q= new \Tuiter\Stacks\Queue;
        $q->put("hola");
        $q->put("que");
        $q->put("mas");
        $q->put("?");
        $q->get();
        $this->assertEquals(3, $q->size());
    }
    public function testTamañoCero(){
        $q= new \Tuiter\Stacks\Queue;
        $q->put("hola");
        $q->put("que");
        $q->put("mas");
        $q->put("?");
        $q->get();
        $q->get();
        $q->get();
        $q->get();
        $this->assertEquals($q->size(),0);
    }


}