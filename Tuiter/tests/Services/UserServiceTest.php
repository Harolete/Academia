<?php

namespace TestTuiter\Services;

use \Tuiter\Services\UserService;

final class UserServiceTest extends \PHPUnit\Framework\TestCase {
    private $collections;

    protected function setUp(): void{
        $conn = new \MongoDB\Client("mongodb://localhost");
        $this->collections =
            $conn->tuiter1->usuarios
         ;
        $this->collections->drop();
        
        
    }


    public function testExisteClase() {
        $this->assertTrue(class_exists("\Tuiter\Services\UserService"));
    }
    public function testRegisterOk(){
        $us = new UserService($this->collections);
        $user= $us->register("mati23", "1234", "matias");
        $this->assertTrue($user);

    }
    public function testRegisterUsers(){
        $us = new UserService($this->collections);
        $user= $us->register("mati23", "1234", "matias");
        $this->assertTrue($user);
        $user2= $us->register("lucho23", "1234", "luciano");
        $this->assertTrue($user2);
    }
    public function testRegisterSameUser(){
        $us = new UserService($this->collections);
        $user= $us->register("mati23", "1234", "matias");
        $this->assertTrue($user);
        $user2= $us->register("mati23", "1234", "luciano");
        $this->assertFalse($user2);
    }

    public function testGetUser(){
        $us = new UserService($this->collections);
        $us->register("mati23", "1234", "matias");
        $user=$us->getUser('mati23');
        $this->assertEquals($user->getUserId(), 'mati23');
    }

    public function testGetUserNotExist(){
        $us = new UserService($this->collections);
        $us->register("mati23", "1234", "matias");
        $user=$us->getUser('culo44');
        $this->assertEquals($user->getUserId(), 'Null');
    }


    public function testAgregarMilUsers(){
        for($i=0;$i<1000;$i++){
            $us = new UserService($this->collections);
            $us->register("user".$i, "nombre".$i, "clave".$i);
            $user=$us->getUser("user".$i);
            $this->assertEquals($user->getUserId(), "user".$i);
            $this->assertEquals($user->getName(), "nombre".$i);
            $this->assertEquals($user->getPassword(), "clave".$i);

        }
    }

}