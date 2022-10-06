<?php
require_once("../config/api.php");
include_once("../config/json-header.php");

$pdo = getconnexion();

function enregistrer(){
    if (!empty($_POST['compte_pseudo']) && !empty($_POST['compte_password'])){

    }
}


if ($_SERVER['REQUEST_METHOD']=='POST'){
    enregistrer();
}