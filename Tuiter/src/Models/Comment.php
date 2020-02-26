<?php

namespace Tuiter\Models;

class Comment
{
    private $commentId;
    private $postId;
    private $userId;
    private $content;

    public function __construct( $postId, $content, $userId, $commentId )
    {
        $this->content = $content;
        $this->userId = $userId;
        $this->postId = $postId;
        $this->commentId = $commentId;
    }


    public function getContent() :string{
        return $this->content;
    }


    public function getCommentId()
    {
        return $this->commentId;
    }


    public function getPostId()
    {
        return $this->postId;
    }

    
    public function getUserId()
    {
        return $this->userId;
    }
}