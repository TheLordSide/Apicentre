<?php
require_once("../config/api.php");
include_once("../config/json-header.php");

$pdo = getconnexion();

function enregistrer(){
    if (!empty($_POST['compte_pseudo']) || !empty($_POST['centre_code'])){
       
        compteexite($_POST['compte_pseudo'],sha1($_POST['compte_password']),$_POST['centre_code']);
    }
    else {
       $response["success"]= false;
       $response["message"]="le code du centre ou la désignation est manquant";
       echo json_encode($response);
    }

}

function compteexite($pseudo,$pass,$code){
    global $pdo;
    $requete = $pdo->prepare("SELECT * from compte where compte_pseudo =:val_pseudo and centre_code=:val_codecentre");
    $requete->bindParam('val_pseudo', $pseudo);
    $requete->bindParam('val_codecentre', $code);
    $requete->execute();
    if ($requete->rowcount()) {
        $response["message"]="Ce compte existe déjà";
        $response["success"]=false;
        echo json_encode($response);
    } else {
        try {
            $insertion= $pdo->prepare("INSERT INTO `compte` (`compte_pseudo`, `compte_password`, `centre_code`) VALUES ( :val_pseudo, :val_pass, :val_code);");
            $insertion->bindParam('val_pseudo', $pseudo);
            $insertion->bindParam('val_code', $code);
            $insertion->bindParam('val_pass', $pass);
            $insertion->execute();
            $response["success"] = true;
            $response["message"] = "la compte a été ajoutée";
            echo json_encode($response);
        } catch (Exception $excep) {
            $response["success"] = false;
            $response["message"] = $excep;
            echo json_encode($response);
        }

    }
}


if ($_SERVER['REQUEST_METHOD']=='POST'){
    enregistrer();
}