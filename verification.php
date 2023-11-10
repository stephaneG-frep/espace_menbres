<?php require 'include/header.php';
require_once 'include/start_bdd.php';
?>
<title>Verification</title>
</head><body>

<?php
if($_GET){
    
    if(isset($_GET['email'])){
        $email = $_GET['email'];
    }
    if(isset($_GET['token'])){
        $token = $_GET['token'];
    }

    if(!empty($email) && !empty($token)){
        $requete = $bdd->prepare('SELECT * FROM menbres.table_menbres 
        WHERE email = :email AND token = :token');
        $requete->bindvalue(':email', $email);
        $requete->bindvalue(':token', $token);

        $requete->execute();

        $nombre = $requete->rowCount();

        if($nombre == 1){
            $update = $bdd->prepare('UPDATE menbres.table_menbres 
            SET validation = :validation, token = :token WHERE email = :email');

            $update->bindvalue(':validation', 1);
            $update->bindvalue(':token', 'valide');
            $update->bindvalue(':email', $email);

            $resultUpdate = $update->execute();

            if($resultUpdate){
               $message = 'Votre email est bien confirmé <a href
               ="connexion.php">Connexion</a>';
            }
        
        }
    
    }
}
//if(isset($message)) echo $message;

?>
