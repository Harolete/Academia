<?php

namespace TestTuiter\Stacks;

use \Tuiter\Stacks\Stack;

final class StackTest extends \PHPUnit\Framework\TestCase {
    public function testClassExists(){
        $this->assertTrue(class_exists("\Tuiter\Stacks\Stack"));
    }
    public function testAgregandoALaCola(){
        $q= new \Tuiter\Stacks\Stack;
        $this->assertTrue($q->push("hola"));
        $this->assertTrue($q->push("que"));
        $this->assertTrue($q->push("mas"));
        $this->assertTrue($q->push("?"));
    }
    public function testAgregandoElmismoALaCola(){
        $q= new \Tuiter\Stacks\Stack;
        $this->assertTrue($q->push("hola"));
        $this->assertTrue($q->push("hola"));
        $this->assertTrue($q->push("hola"));
        $this->assertTrue($q->push("hola"));

        $this->assertTrue($q->push("que"));

        $this->assertTrue($q->push("mas"));
        $this->assertTrue($q->push("mas"));

        $this->assertTrue($q->push("?"));
    }
    public function testBorrandoUno(){
        $q= new \Tuiter\Stacks\Stack;
        $q->push("hola");
        $q->push("que");
        $q->push("mas");
        $q->push("?");
        $this->assertEquals($q->pop(),"?");
    }
    public function testBorrandotodo(){
        $q= new \Tuiter\Stacks\Stack;
        $q->push("hola");
        $q->push("que");
        $q->push("mas");
        $q->push("?");
        $this->assertEquals($q->pop(),"?");
        $this->assertEquals($q->pop(),"mas");
        $this->assertEquals($q->pop(),"que");
        $this->assertEquals($q->pop(),"hola");
    }
    public function testBorrandoVacio(){
        $q= new \Tuiter\Stacks\Stack;
        $q->push("hola");
        $q->push("que");
        $q->push("mas");
        $q->push("?");
        $this->assertEquals($q->pop(),"?");
        $this->assertEquals($q->pop(),"mas");
        $this->assertEquals($q->pop(),"que");
        $this->assertEquals($q->pop(),"hola");
        $this->assertFalse($q->pop());
    }
    public function testEmpty(){
        $q= new \Tuiter\Stacks\Stack;
        $q->push("hola");
        $q->push("que");
        $q->push("mas");
        $q->push("?");
        $this->assertFalse($q->empty());
        $q->pop();
        $q->pop();
        $q->pop();
        $q->pop();
        $this->assertTrue($q->empty());

    }
}