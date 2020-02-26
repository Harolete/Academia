<?php

namespace TestTuiter\Services;

use \Tuiter\Services\UserService;
use Tuiter\Services\ReshardinMongoService;

final class ReshardingTest extends \PHPUnit\Framework\TestCase {

    private $collections;

    protected function setUp(): void{
        $conn = new \MongoDB\Client("mongodb://localhost");
        $this->collections =array(
            $conn->tuiter1->usuarios,
            $conn->tuiter2->usuarios
        );
        $this->collections2 =array(
            $conn->tuiter1->usuarios,
            $conn->tuiter2->usuarios,
            $conn->tuiter3->usuarios,
            $conn->tuiter4->usuarios
        );
        foreach($this->collections as $v){
            $v->drop();
        }
        foreach($this->collections2 as $v){
            $v->drop();
        }        
    }
    public function testExisteClase() {
        $this->assertTrue(class_exists("\Tuiter\Services\ReshardinMongoService"));
    }

    public function testRegistro(){
        $user= new UserService($this->collections);
        for($i=0;$i<1000;$i++){
            $user->register("user".$i,"nombre".$i,"contraseña".$i);
        }
        $reshar= new ReshardinMongoService();
        $reshar->reshardingUsers($this->collections,$this->collections2);

        $user2= new UserService($this->collections2);
        for($i=0;$i<1000;$i++){
            $us=$user2->getUser("user".$i);
            $id=$us->getUserId();
            $name=$us->getName();
            $pass=$us->getPassword();
            $this->assertEquals($id,"user".$i);
            $this->assertEquals($name,"nombre".$i);
            $this->assertEquals($pass,"contraseña".$i);
        }
    }

    public function testRegistro2(){


    }



}