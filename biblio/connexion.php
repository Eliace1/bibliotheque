<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" integrity="sha512-kJlvECunwXftkPwyvHbclArO8wszgBGisiLeuDFwNM8ws+wKIw0sv1os3ClWZOcrEB2eRXULYUsm8OVRGJKwGA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>connexion</title>
</head>
 <?php
    if(isset($_POST['connexion'])){
        include_once "connexionbd.php";
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $password=mysqli_real_escape_string($conn,$_POST['password']);
        $req=mysqli_query($conn,"select * from users where email='$email'");
        $row=mysqli_fetch_assoc($req);
        if(mysqli_num_rows($req)>0){
            $req1=password_verify($password,$row['password']);
            if($req1){
                session_start();
                $_SESSION['email']=$row['email'];
                $_SESSION['nom']=$row['nom'];
                $_SESSION['id']=$row['id'];
                header("location:livre.php");
            }else{
                $message ="<p class='message'> email ou mot de passe incorrect </p>";
            }
        }else{
            $message ="<p class='message'> email ou mot de passe incorrect </p>";
        }
    }
?>
<body>
    <div class="section">
    <div class="nav">
                <div>
                    <a href="index.php"><i class="ri-home-line"></i>Accueil</a>
                </div>
                <div>
                    <a href="livre.php"><i class="ri-book-3-line"></i>livres</a>
                </div>
                <?php
                session_start();
                if(isset($_SESSION['id'])){
                    echo'
                    <div class="fin">
                    <a href="profil.php"><i class="ri-profile-line"></i>Profil</a>
                </div>
                    <div class="fin">
                    <a href="deconnexion.php"><i class="ri-logout-box-line"></i>deconnexion</a>
                </div>'
                ;
                }else{
                    echo'<div class="fin">
                    <a href="connexion.php"><i class="ri-login-box-line"></i>connexion</a>
                </div>';
                }
                
                ?>
        </div>
        <div class="titre">
            <form action="" class="formulaire" method="post">
                <h1>Connexion</h1>
                 <?php
                    if(isset($_POST['connexion'])){
                        echo $message;
                    }
                ?> 
                <div class="espace">
                    <label for="email">email </label>
                    <input type="text" name="email" required>
                    <i class="ri-mail-line"></i>
                </div>
                <div  class="espace">
                    <label for="">Mot de passe</label>
                    <input  type="password" name="password" required>
                    <i class="ri-lock-line"></i>
                </div>
                <p><strong><a href="">mot de passe oublié ?</a></strong></p>
                <button type="submit" name="connexion">Connexion</button>
                <p><strong>vous avez déjà un compte ?</strong><a href="inscription.php">s'inscrire</a></p>
            </form>
        </div>
    </div>
    <footer>
        <div>
            <p>&copymyBiblio</p>
        </div>
        <div>
            <p>Telephone : 0758023603</p>
            <p>Email: tacaladongmoasliedurel@gmail</p>
        </div>
        <div>
            <p>3 Rue de Strasbourg <br> 87100 Limoges</p>
        </div>
    </footer>
</body>
</html>