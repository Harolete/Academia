<?php
include(__DIR__ . '/../vendor/autoload.php');


use Tuiter\Services\ReshardinMongoService as reshar;
use \Tuiter\Services\UserService;


$conn = new \MongoDB\Client("mongodb://localhost");

$old=array($conn->tuiter1->usuarios,$conn->tuiter2->usuarios);
$new=array(
    $conn->tuiter1->usuarios,
    $conn->tuiter2->usuarios,
    $conn->tuiter3->usuarios,
    $conn->tuiter4->usuarios);

// $user= new UserService($old);
// for($i=0;$i<1000;$i++){
//     $user->register("user".$i,"nombre".$i,"contraseña".$i);
// }

$resh= new reshar();
$resh->reshardingUsers($old);
$resh->reshardingUsers2($new);