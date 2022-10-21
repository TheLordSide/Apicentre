<?php
include("../config/json-header.php");
require_once("../config/api.php");

$pdo = getconnexion();

function supprimer(){
    
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    supprimer();
}

