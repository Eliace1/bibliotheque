<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" integrity="sha512-kJlvECunwXftkPwyvHbclArO8wszgBGisiLeuDFwNM8ws+wKIw0sv1os3ClWZOcrEB2eRXULYUsm8OVRGJKwGA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>inscription</title>
</head>
 <?php
    if(isset($_POST['inscrire'])){
        include_once "connexionbd.php";
        $nom=mysqli_real_escape_string($conn,$_POST['nom']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $passwd=$_POST['passwd'];
        $confirm=$_POST['confirm'];
        if(empty($email)|| empty($passwd)|| empty($confirm)||empty($nom)){
            $message= "<p class='message'>veillez entrer tous les champs</p>";
        }else if($passwd!==$confirm){
            $message = "<p class='message'>le mot de passe n'est pas le meme</p>";
        }else{
            $hash=password_hash($passwd, PASSWORD_DEFAULT);
            $req1=mysqli_query($conn,"INSERT INTO users values(null,'$nom','$email','$hash')");
            if($req1){
                 $message = "<p class='message'>inscription reussi</p>";
            }
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
                <h1>S'inscrire</h1>
                <!-- <?php
                    if(isset($_POST['inscrire'])){
                            echo $message;
                     }
                ?> -->
                <div class="espace">
                <label for="email">Nom </label>
                    <input type="text" name="nom" required>
                    <i class="ri-user-line"></i>
                </div>
                <div class="espace">
                    <label for="email">email </label>
                    <input type="text" name="email" required>
                    <i class="ri-mail-line"></i>
                </div>
                <div  class="espace">
                    <label for="">Mot de passe</label>
                    <input  type="password" name="passwd" required>
                    <i class="ri-lock-line"></i>
                </div>
                <div  class="espace">
                    <label for="">Confirmation</label>
                    <input  type="password" name="confirm" required>
                    <i class="ri-lock-line"></i>
                </div>
                <button type="submit" name="inscrire"> s'inscrire</button>
                <p><strong>vous avez déjà un compte ?</strong><a href="connexion.php">se connecter</a></p>
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