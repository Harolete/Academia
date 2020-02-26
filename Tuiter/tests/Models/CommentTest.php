<?php

namespace TestTuiter\Models;

use Tuiter\Models\Comment;

final class CommentTest extends \PHPUnit\Framework\TestCase {

    public function testClassExists() {
        $this->assertTrue(class_exists("\Tuiter\Models\Comment"));
    }
    public function testUnObject() {
        $com = new Comment("postId", "soyelcapo", "Juan Tuiter","kkl");

        $this->assertTrue($com instanceof Comment);
        $this->assertEquals("postId", $com->getPostId());
        $this->assertEquals("soyelcapo", $com->getContent());
        $this->assertEquals("Juan Tuiter", $com->getUserId());
        $this->assertEquals("kkl",$com->getCommentId());
    }
    public function testDosObject() {
        $com = new Comment("postId2", "soyelcapo2", "Juan Tuiter2","ppls");

        $this->assertTrue($com instanceof Comment);
        $this->assertEquals("postId2", $com->getPostId());
        $this->assertEquals("soyelcapo2", $com->getContent());
        $this->assertEquals("Juan Tuiter2", $com->getUserId());
        $this->assertEquals("ppls",$com->getCommentId());
    }
}