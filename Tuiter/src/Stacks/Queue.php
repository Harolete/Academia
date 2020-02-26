<?php

namespace Tuiter\Stacks;


// class Queue{
    
//     private $lista=array();

//     public function Put($element){
//         $this->lista[]=$element;
//                 return true;
          
//     }
//     public function get(){
//         if(!empty($this->lista[0])){
//             $ele=array_shift($this->lista);
//             return $ele;
//         }else{
//             return false;
//         }
//     }
//     public function size(){
//         $size=count($this->lista);
//         return $size;
//     }
    
// } 

class Queue{
    private $stack;
    private $stack2;

    public function __construct(){
        $this->stack= new \Tuiter\Stacks\Stack();
        $this->stack2= new \Tuiter\Stacks\Stack();

    }
    public function Put($element){
        while(!($this->stack2->empty())){
        $this->stack->push($this->stack2->pop());
        }
        $this->stack->push($element);
        return true;       
    }


    public function get(){
       while(!($this->stack->empty())){       
            $this->stack2->push($this->stack->pop());
        }
            return $this->stack2->pop();      
    }


    public function size(){
        $size=0;
        while(!($this->stack->empty())){       
            $this->stack2->push($this->stack->pop());
        }
        while(!($this->stack2->empty())){       
            $this->stack->push($this->stack2->pop());
            $size=$size+1;
        }
        return $size;
    }
    
} 