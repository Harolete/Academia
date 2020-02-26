<?php

namespace TestTuiter\Models;

use Tuiter\Models\CommentNull;

final class CommentNullTest extends \PHPUnit\Framework\TestCase {

    public function testClassExists() {
        $this->assertTrue(class_exists("\Tuiter\Models\CommentNull"));
    }
    public function testNull() {
        $com = new CommentNull("postId", "soyelcapo", "Juan Tuiter","kk");

        $this->assertTrue(is_subclass_of($com,"\Tuiter\Models\Comment"));
        $this->assertEquals("null", $com->getPostId());
        $this->assertEquals("null", $com->getContent());
        $this->assertEquals("null", $com->getUserId());
        $this->assertEquals("null", $com->getCommentId());

    }
}