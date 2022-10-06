<?php
require_once("config/api.php");
require_once("config/json-header.php");

$pdo = getconnexion();

#fonction de connexion utlisateur
function seconnecter(){

    global $pdo;

    if (!empty($_POST['compte_pseudo']) && !empty($_POST['compte_password'])){
        try{
            global $pdo;
            $passhassed = sha1($_POST['compte_password']);
            $requete = $pdo->prepare("SELECT * FROM etudiants where compte_pseudo =:valeur1 
            and compte_password =:valeur2;");
            $requete->bindParam(':valeur1', $_POST['compte_password']);
            $requete->bindParam(':valeur2', $passhassed);
            $requete->execute();
            if ($requete->rowcount()) {
                $response["success"] = true;
                $response["message"] = "authentification correcte";
                $response["email"] = $_POST['compte_user_mail'];
                $response["password"] = $_POST['compte_password'];
                echo json_encode($response);

                // resultjson(true,"ce compte existe",);
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