<?php
require_once("../config/api.php");
include_once("../config/json-header.php");

$pdo = getconnexion();

#fonction de connexion utlisateur
function seconnecter(){

    global $pdo;

    if (!empty($_POST['compte_pseudo']) && !empty($_POST['compte_password'])){
        try{
            global $pdo;
            $passhassed = sha1($_POST['compte_password']);
            $requete = $pdo->prepare("SELECT * FROM compte where compte_pseudo =:valeur1 
            and compte_password =:valeur2;");
            $requete->bindParam(':valeur1', $_POST['compte_pseudo']);
            $requete->bindParam(':valeur2', $passhassed);
            $requete->execute();
            if ($requete->rowcount()) {
                $response["success"] = true;
                $response["message"] = "authentification correcte";
                $response["pseudo"] = $_POST['compte_pseudo'];
                $response["password"] = $_POST['compte_password'];
                echo json_encode($response);

            } else {
                $response["success"] = false;
                $response["message"] = "authentification incorrecte";
                echo json_encode($response);
            }
        }
        catch(Exception $ex){
            echo json_encode($ex);
        }
    }
}

if ($_SERVER['REQUEST_METHOD']=='POST'){
        seconnecter();
}