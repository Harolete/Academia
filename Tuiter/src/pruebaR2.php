<?php
include(__DIR__ . '/../vendor/autoload.php');


use Tuiter\Services\ReshardinMongoService as reshar;
use \Tuiter\Services\UserService;


$conn = new \MongoDB\Client("mongodb://localhost");

$old=array($conn->tuiter1->usuarios,$conn->tuiter2->usuarios);
$new=array(
    $conn->tuiter3->usuarios,
    $conn->tuiter4->usuarios,
    $conn->tuiter5->usuarios,
    $conn->tuiter6->usuarios);


$resh= new reshar();
$resh->reshardingUsers2($new);