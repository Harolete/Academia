<?php

namespace Tuiter\Models;

class CommentNull extends Comment {
    
    public function getCommentId() :string{
        return "null";
    }
    public function getPostId(){
        return "null";
    }
    public function getContent() :string{
        return "null";
    }
    public function getUserId() :string{
        return "null";
    }
}