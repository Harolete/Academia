<?php

namespace Tuiter\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class VerCommentController implements \Tuiter\Interfaces\Controller {

    public function config($app) {

        $app->get('/verComment/{postId}', function (Request $request, Response $response, array $args) {
            
            $template = $request->getAttribute('twig')->load('verComment.html');
            $postId = $args['postId'];
            $com = $request->getAttribute("commentService");
            $ps=$request->getAttribute("postService");

            $post = $ps->getPost($postId);
            $postUser=$post->getUserId();
            $postContent=$post->getContent();
            $comments=$com->getAllComments($post);
// var_dump($comments);die;
            $response->getBody()->write(
                $template->render([
                    'post'=>$postUser,
                    'postContent'=> $postContent,
                    'comments' => $comments
                ])
            );
           
            return $response;
        });
    }
}