<?php

namespace Tuiter\Services;

class UserService {

    private $collections;

    public function __construct( $collection){
        $this->collections= $collection;
    }
    
    public function register(string $userId, string $name, string $password) {
        // $nu=md5($userId);
        // $numero=0;
        // for($i=0;$i<strlen($nu);$i++){
        //     $numero+=ord($nu[$i]);
        // }
        // $db=$numero%count($this->collections);

        $user = $this->getUser($userId);
        if($user instanceof \Tuiter\Models\UserNull){
            $usuarios= array();
            $usuarios['userId']= $userId;
            $usuarios['name']= $name;
            $usuarios['password']=$password;
            $this->collections->insertOne($usuarios);

            return true;
        } else {
            return false;
        }
    }
    public function getUser($userId){
        // $nu=md5($userId);
        // $numero=0;
        // for($i=0;$i<strlen($nu);$i++){
        //     $numero+=ord($nu[$i]);
        // }
        // $db=$numero%count($this->collections);
        $cursor= $this->collections->findOne(['userId'=> $userId]);
        if (is_null($cursor)){
            $user = new \Tuiter\Models\UserNull('','','');
            return $user;
        }
        $user = new \Tuiter\Models\User($cursor['userId'],$cursor['name'], $cursor['password']);
        return $user;
    }
}
