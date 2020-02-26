<?php

namespace Tuiter\Stacks;


class Stack{
    private $lista=array();

    public function push($element){
        $this->lista[]=$element;
        return true;
    }
    public function pop(){
        $count=count($this->lista)-1;
        if(!empty($this->lista[$count])){
            $ele=$this->lista[$count];
            unset($this->lista[$count]);
            return $ele;
        }else{
            return false;
        }

    }
    public function empty(){
        if(empty($this->lista)){
            return true;
        }else{
            return false;
        }
    }
} 