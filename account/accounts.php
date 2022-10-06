<?php
require_once("../config/api.php");
include_once("../config/json-header.php");

$pdo= getconnexion();
function touslescomptes(){
    global $pdo;
    $query = $pdo->prepare("select * from compte");
    $query->execute();
    $response["success"]= true;
    $response["message"]="liste des comptes";
    $response["total"]=$query->rowCount();
    $response["userlist"]=$query->fetchAll();
    echo json_encode($response);
}

if($_SERVER['REQUEST_METHOD']=='GET'){
    touslescomptes();
}
