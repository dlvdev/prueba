<?php

require_once "nusoap.php";

function getResta($a, $b) {
    if($b <= $a){
    $resta= $a-$b;
    return $resta;
}else{
    return $resta = "El primer número es menor y no se realizó la resta";
}
}

function getCuadrado($a){
    $cuadrado = $a*$a;
    return $cuadrado;
}

function getDivision($a,$b){
    $division = $a/$b;
    return $division;
}



$server = new soap_server();
$server->configureWSDL("servidor", "urn:servidor");

$server->register("getResta", 
array("xsd:number", "xsd:number"), 
array("return" => "xsd:String"), 
"urn:servidor", "urn:servidor#getResta", 
"rpc", "encoded", 
"Resta");


$server->register("getCuadrado", 
array("xsd:number"), 
array("return" => "xsd:String"), 
"urn:servidor", "urn:servidor#getCuadrado", 
"rpc", "encoded", 
"Cuadrado");

$server->register("getDivision", 
array("xsd:number", "xsd:number"),  
array("return" => "xsd:String"), 
"urn:servidor", "urn:servidor#getDivision", 
"rpc", "encoded", 
"Division");


$server->service(file_get_contents("php://input"));
?>