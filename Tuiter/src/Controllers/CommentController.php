<?php

namespace Tuiter\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CommentController implements \Tuiter\Interfaces\Controller {

    public function config($app) {

        $app->post('/comment/{postId}', function (Request $request, Response $response, array $args) {
            $postId=$args["postId"];

            $comments=$_POST['comment'];
            
            $commentService=$request->getAttribute("commentService");
            
            $postService=$request->getAttribute("postService");
            
            $post = $postService->getPost($postId);
            
            $user = $request->getAttribute('user');
            
            $commentService->create($post,$comments,$user);
            
            $response = $response->withStatus(302);
            
            $response = $response->withHeader("Location", "/feed");
            return $response;
        });
    }
}