<?php require 'include/header.php'; ?>

<title>Réinitialisation</title>
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

    require_once 'include/start_bdd.php';

    $requete = $bdd->prepare('SELECT * FROM menbres.recup_password WHERE 
    email=:email AND token=:token ');
    $requete->bindvalue(':email', $email);
    $requete->bindvalue(':token', $token);

    $requete->execute();

    $nombre = $requete->rowCount();

    if($nombre!=1){
        header('Location:connexion.php');
    }else{
        if(isset($_POST['new_password'])){

            if(empty($_POST['password']) || $_POST['password'] !=$_POST['password2']){
                $message = "Rentrer un mot de passe valide";
            }
            else{
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $requete = $bdd->prepare('UPDATE menbres.table_menbres 
                SET password=:password WHERE email=:email');
                $requete->bindvalue(':email', $email);
                $requete->bindvalue(':password', $password);

                $result = $requete->execute();

                if($result){
                    $message = 'Votre email est bien réinitialisé <a href
                ="connexion.php">Connexion</a>';


                }else{
                    $message = "Mot de passe non réinitialisé";
                    //header('Location:connexion.php');
                }
            }
        }
    }
}

}else{
    header('Location:inscription.php');
}
if(isset($message)) echo $message;
?>

<div id="login">
        <h1 class="text-center text-white pt-5">Nouveau mot de passe</h1>
        <h6 class="text-center text-white pt-5">Merci d'entrer votre nouveau mot de passe : </h6>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">


                    <center><div class="container" style="background-color: red;">
                        <font color="white"><?php if(isset($message))echo $message; ?></font>
                        </div></center> 

                        <center><div class="container" style="background-color:#FB6969;">
                        <font color="#8B0505"><?php if(isset($message1))echo $message1; ?></font>
                        </div></center> 


                        <form id="login-form" class="form" action="" method="post">

                        <div class="form-group">
                            <label for="password" class="text-info">Votre nouveau mot de passe: </label><br>
                            <input type="passeword" name="password" id="password" class="form-control"
                            placeholder='Nouveau mot de passe'>
                        </div>

                        <div class="form-group">
                            <label for="password2" class="text-info">Confirmation du  nouveau mot de passe: </label><br>
                            <input type="password" name="password"2 id="password2" class="form-control"
                            placeholder='Confirmer mot de passe'>
                        </div>


                        <div class="form-group">
                            <input type="submit" name="new_passwordt" class="btn btn-info btn-md"
                            value="Valider : ">    
                        </div>

                        

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
