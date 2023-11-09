<?php require 'include/header.php'; ?>
<title>Connexion</title>
</head><body>
    
<?php

if(isset($_POST['connexion'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'include/start_bdd.php';

    $requete = $bdd->prepare('SELECT * FROM menbres.table_menbres
    WHERE email = :email');
    $requete->execute(array('email'=> $email));
    $result = $requete->fetch();

    if(!$result){
        $message = "merci de rentrer une adresse valide !";
    }
    elseif($result['validation'] == 0){
        function tokenRandomString($leng) {
            $str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $token = '';
            for($i=0;$i<$leng;$i++) {
                $token.=$str[rand(0,strlen($str)-1)];
            }
            return $token;
        }   
    
        $token = tokenRandomString(20);

        $update = $bdd->prepare('UPDATE menbres.table_menbres SET token = :token
        WHERE email = :email');
        $update->bindvalue(':token', $token);
        $update->bindvalue(':email', $_POST['email']);
        $update->execute();

        require_once 'sendmail.php';

    }else{
        $passwordIsOk = password_verify($password, $result['password']);
        if($passwordIsOk){
            session_start();
            $_SESSION['id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['email'] = $email;

            if(isset($_POST['sesouvenir']))
            {
                setcookie("email", $_POST['email']);
                setcookie("password", $_POST['password']);
            }
            else
            {
                if(isset($_COOKIE['email']))
                {
                    setcookie($_COOKIE['email'], "");
                }
                if(isset($_COOKIE['password']))
                {
                    setcookie($_COOKIE['password'],"");
                }
            }
            header('location:index.php');
        }
        else {
            $message = " mot de passe non valide";
        }
    }
}

?>

</header>
<div id="login">
        <h1 class="text-center text-white pt-5">Connexion </h1>
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
                            <label for="email" class="text-info">Adresse Email</label><br>
                            <input type="email" name="email" id="email" class="form-control"
                            value = <?php if(isset($_COOKIE['email'])) {echo $_COOKIE['email'];} ?> >
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-info">Mot de passe</label><br>
                            <input type="password" name="password" id="password" class="form-control"
                            value = <?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?> >
                        </div>

                        <div class="form-group">
                            <label for="sesouvenir" class="text-info">Se souvenir de moi
                            <input type="checkbox" name="sesouvenir"
                            id="sesouvenir"></label>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="connexion" class="btn btn-info btn-md"
                            value="connexion">
                            <a href="password_forget.php">Mot de passe oublié</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
