<?php require 'include/header.php'; ?>
<title>Inscription</title>


<?php
if(isset($_POST['inscription']))
{
    if(empty($_POST["username"]) || !preg_match('/[a-zA-Z0-9]+/', $_POST["username"]))
{
    $message = "Votre username doit etre une chaine de caractères !";
}
elseif(empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
{
    $message = "Entrer une adresse valide !";
}
elseif(empty($_POST["password"]) || $_POST["password"] != $_POST["password2"])
{
    $message = "Entrer un mot de passe valide";
}
else
{
    require_once 'include/start_bdd.php';


    $req = $bdd->prepare('SELECT * FROM menbres.table_menbres WHERE username = :username');

    $req->bindvalue(':username', $_POST['username']);
    $req->execute();
    $result = $req->fetch();

    $req1 = $bdd->prepare('SELECT * FROM menbres.table_menbres WHERE email = :email');

    $req1->bindvalue(':email', $_POST['email']);
    $req1->execute();
    $result1 = $req1->fetch();

    if($result)
    {
        $message = 'votre username existe déjas';
    }
    elseif($result1)
    {
        $message = 'un compte existe déja avec cette adresse email';
    }
    else
    {

    function tokenRandomString($leng) {
        $str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $token = '';
        for($i=0;$i<$leng;$i++) {
            $token.=$str[rand(0,strlen($str)-1)];
        }
        return $token;
    }   

    $token = tokenRandomString(20);


        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $requete = $bdd->prepare('INSERT INTO menbres.table_menbres(username, email,
        password, token) VALUES (:username, :email, :password, :token)');
    
        $requete->bindvalue(':username', $_POST['username']);
        $requete->bindvalue(':email', $_POST['email']);
        $requete->bindvalue(':password', $password);
        $requete->bindvalue(':token', $token);
    
        $requete->execute();

        require_once 'sendmail.php';
    
        //$message = 'Vous vous ètes inscrits';

        }    
    }
}

?>

    <div id="login">
        <h1 class="text-center text-white pt-5">Inscription</h1>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">


                    <center><div class="container" style="background-color:#FB6969;">
                        <font color="#8B0505"> <?php if(isset($message))echo $message; ?> </font>
                        </div></center>

                        <center><div class="container" style="background-color:#95D588;">
                        <font color="#115702"> <?php if(isset($message1))echo $message1; ?> </font>
                        </div></center>


                        <form id="login-form" class="form" action="" method="post">

                        <div class="form-group">
                            <label for="username" class="text-info">Username</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email" class="text-info">Adresse Email</label><br>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-info">Mot de passe</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password2" class="text-info">Confirmation du mot de passe</label><br>
                            <input type="password" name="password2" id="password2" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="inscription" class="btn btn-info btn-md" value="s'inscrire">
                            <a href="connexion.php" class="btn btn-info btn-md">Se connecter</a>

                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
