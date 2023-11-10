<?php require 'include/header.php'; ?>
<title>Réinitialisation</title>
</head><body>

<?php 
if(isset($_POST['password_forget'])){
    
    function tokenRandomString($leng=20) {

        $str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $token = '';
        for($i=0;$i<$leng;$i++) {
            $token.=$str[rand(0,strlen($str)-1)];
        }
        return $token;
    }  

    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $message = "Rentrer une adresse email valide";
    }else{
        require ('include/start_bdd.php');

        $requete = $bdd->prepare('SELECT * FROM menbres.table_menbres WHERE email = :email');
        $requete->bindvalue(':email', $_POST['email']);
        $requete->execute();

        $result = $requete->fetch();

        $nombre = $requete->rowCount();

        if($nombre != 1){
            $message = "adresse mail non enregistrée chez nous";
        }
        else{
            if($result['validation']!=1){

                $token = tokenRandomString(20);

                $update = $bdd->prepare('UPDATE menbres.table_menbres SET
                token = :token WHERE email = :email');
                $update->bindvalue(':token', $token);
                $update->bindvalue(':email', $_POST['email']);
                $update->execute();

                require_once 'sendmail.php';

            }else{
                $token = tokenRandomString(20);
                $requete1 = $bdd->prepare('SELECT * FROM menbres.recup_password 
                WHERE email = :email');
                $requete1->bindvalue(':email', $_POST['email']);
                $requete1->execute();

                $nombre1 =  $requete1->rowCount();

                if($nombre1 == 0){

                    $requete2 = $bdd->prepare('INSERT INTO menbres.recup_password
                    (email, token) VALUES (:email, :token)');
                    $requete2->bindvalue(':email', $_POST['email']);
                    $requete2->bindvalue(':token', $token);
                    $requete2->execute();

                }else{
                    $requete3 = $bdd->prepare('UPDATE menbres.recup_password 
                    SET token = :token WHERE email = :email');
                    $requete3->bindvalue(':token', $token);
                    $requete3->bindvalue(':email', $_POST['email']);
                    $requete3->execute();
                }
                
                require_once 'sendmail_recup.php';

            }
        }
    }
}
?>

<div id="login">
        <h1 class="text-center text-white pt-5">Mot de passe oublié</h1>
        <h6 class="text-center text-white pt-5">Merci d'entrer votre adresse
            mail pour recevoir un email de réinitialisation de votre mot de passe : </h6>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">


                    <center><div class="container" style="background-color: red;">
                        <font color="white"><?php if(isset($message))echo $message; ?></font>
                        </div></center> 

                        <center><div class="container" style="background-color:#FB6969;">
                        <font color="#8B0505"><?php if(isset($message))echo $message; ?></font>
                        </div></center> 
   

                        <form id="login-form" class="form" action="" method="post">

                        <div class="form-group">
                            <label for="email" class="text-info">Votre adresse Email : </label><br>
                            <input type="email" name="email" id="email" class="form-control"
                            placeholder='Exp: dugenous@exemple.com'>
                        </div>


                        <div class="form-group">
                            <input type="submit" name="password_forget" class="btn btn-info btn-md"
                            value="Réinitialisation du mot de passe ">    
                        </div>

                        <div class="form-group">
                            <input type="submit" name="Connexion" class="btn btn-info btn-md"
                            value="connexion "> 
                            <a href="connexion.php">Retour a la connexion</a>
                        </div>
                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
