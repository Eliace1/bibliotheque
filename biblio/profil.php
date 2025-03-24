<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" integrity="sha512-kJlvECunwXftkPwyvHbclArO8wszgBGisiLeuDFwNM8ws+wKIw0sv1os3ClWZOcrEB2eRXULYUsm8OVRGJKwGA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>profil</title>
</head>
<?php
    session_start();
    if(isset($_POST['modifier'])){
        include_once "connexionbd.php";
        $id=$_SESSION['id'];
        $nom=mysqli_real_escape_string($conn,$_POST['nom']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $req1=mysqli_query($conn," UPDATE users set nom = '$nom' , email='$email' where id = $id ");
        $_SESSION['email']=$email;
        $_SESSION['nom']=$nom;
        
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
                <h1>modifier</h1>
                <div class="espace">
                <label for="email">Nom </label>
                    <input type="text" value = "<?php echo $_SESSION['nom'] ?>" name="nom" required>
                    <i class="ri-user-line"></i>
                </div>
                <div class="espace">
                    <label for="email">email </label>
                    <input type="text" value = "<?php echo $_SESSION['email'] ?>" name="email" required>
                    <i class="ri-mail-line"></i>
                </div>
                <button type="submit" name="modifier">modifier</button>
            </form>
            <div class="livre" id="livre">
                    <?php
                    include_once "connexionbd.php";
                    $id=$_SESSION['id'];
                    $req=mysqli_query($conn,"SELECT * FROM books INNER JOIN emprunt ON id=id_books WHERE id_users='$id' ");
                    while($row=mysqli_fetch_assoc($req)){
                        $_SESSION['livre']=$row['id'];

                        echo'
                    <div>
                        <p><strong>'.$row['title'].'</strong></p>
                        <img src="image/'.$row['lien'].'" alt="">
                        <p>Auteur : '.$row['author'].'</p>
                        <p> Description : '.$row['description'].'</p>
                        <p>Année de sortie : '.$row['year'].' </p>
                    </div>';
                    }
                    ?>

            </div>
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