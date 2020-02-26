<?php

namespace TestTuiter\Services;

use Tuiter\Models\Comment;
use Tuiter\Services\PostService;
use Tuiter\Models\User;
use Tuiter\Models\Post;

final class CommentServiceTest extends \PHPUnit\Framework\TestCase {

    protected function setUp(): void{
        $connection = new \MongoDB\Client("mongodb://localhost");
        $collection = $connection->CommentServiceTest->CosmmentTest;
        $collection->drop();
        $collectionUserService  = $connection->CommentServiceTest->UserService;
        $collectionUserService->drop();
        $coll= $connection->CommentServiceTest->PostService;
        $coll->drop();

        $this->us = new \Tuiter\Services\UserService($collectionUserService);
        $this->com= new \Tuiter\Services\CommentService($collection);
        $this->post= new \Tuiter\Services\PostService($coll);
        
    }

    public function testClassExists(){
        $this->assertTrue(class_exists("\Tuiter\Services\CommentService"));
    }

    public function testCreaComment(){
        $content = "Esto es un comentario";
        $user = new User("userId","Juan Perez","pass");
        $post= new Post("pos1","qlq","pepe22",8);
        $postReturned = $this->com->create($post, $content,$user);
        // var_dump($postReturned);die;
        $this->assertTrue($postReturned instanceof Comment);
    }

    public function testCreaDosComments(){
        $content1 = "Esto es un commentario";
        $content2 = "Esto otro comentario";
        $user = new User("userId","Juan Perez","pass");
        $post=$this->post->create("hola",$user);
        $postReturned1 = $this->com->create($post, $content1,$user);
        $postReturned2 = $this->com->create($post, $content2,$user);
        $this->assertTrue($postReturned1 instanceof Comment);
        $this->assertTrue($postReturned2 instanceof Comment);
    }

    public function testGetCommentNull(){
        $postReturned = $this->com->getComment("notSavedId");
        $this->assertTrue(is_subclass_of($postReturned,"\Tuiter\Models\Comment"));
    }


    public function testDosGetComments(){
        $user = new User("userId","Juan Perez","pass");
        $content1 = "Esto es un comentario";
        $content2 = "Esto otro comentario";
        $post=$this->post->create("hello",$user);
        $postReturned1 = $this->com->create($post,$content1,$user);
        $postReturned2 = $this->com->create($post,$content2,$user);

        $postReturned11 = $this->com->getComment($postReturned1->getCommentId());
        $postReturned22 = $this->com->getComment($postReturned2->getCommentId());
        $this->assertEquals($postReturned1,$postReturned11);
        $this->assertEquals($postReturned2,$postReturned22);
    }

    public function testGetAllPost(){
        $content1 = "Esto es un comentario";
        $content2 = "Esto otro comentario";
        $user = new User("userId","Juan Perez","pass");
        $post=$this->post->create("hola",$user);
        $postReturned1 = $this->com->create($post, $content1,$user);
        $postReturned2 = $this->com->create($post, $content2,$user);
        $resultArray = array($postReturned1,$postReturned2);
        $this->assertEquals($resultArray,$this->com->getAllComments($post));
    }
} 