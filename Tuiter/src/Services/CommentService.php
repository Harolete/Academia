<?php

namespace Tuiter\Services;

use Tuiter\Models\User;
use Tuiter\Models\Comment;
use Tuiter\Models\CommentNull;
use Tuiter\Models\Post;

class CommentService
{
    protected $collection;
    public function __construct(\MongoDB\Collection $collection)
    {
        $this->collection = $collection;
    }

    public function create(Post $post, string $content, User $user): Comment{
        $userId = $user->getUserId();
        $postId = $post->getPostId();
        $commentId=md5(microtime());
        $confirm = $this->collection->insertOne(
            array(
                "postId"=>$postId,
                "owner" => $userId,
                "content" => $content,
                "commentId" => $commentId
            )
        );
        if ($confirm->getInsertedCount() != 1){
            return new CommentNull($postId, $userId, $content,$commentId);
        }
        // var_dump($userId);die;

        return new Comment($postId, $content, $userId, $commentId);
    }

    public function getComment(string $commentId): Comment{
        $comment = $this->collection->findOne(array(
            "commentId" => $commentId
        ));

        if ($comment == null){
            return new CommentNull("null","null","null",0);
        }
        
        return new Comment(
            $comment["postId"],
            $comment["content"],
            $comment["owner"],
            $comment['commentId']
        );
    }


    public function getAllComments(Post $post): array{
        $cursor = $this->collection->find(
            array(
                "postId" => $post->getPostId()
            )
        );
        $comments = array();
        foreach($cursor as $comment){
            $newComment = new Comment(
                $comment["postId"],
                $comment["content"],
                $comment["owner"],
                $comment['commentId']
                );
            $comments [] = $newComment;
        }
        return $comments;
    }
}