<?php require 'include/header.php'; ?>
<title>Commentaires</title>
</head><body>

<?php
session_start();


?>


<div id="login">
        <h1 class="text-center text-white pt-5">Commentaires </h1>
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
                            <textarea  name="commentaire" placeholder="Votre commentaire..."></textarea><br />
                            <input type="submit" value="Poster mon commentaire" name="submit_commentair">
                        </div>

                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
