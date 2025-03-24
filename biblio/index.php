<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" integrity="sha512-kJlvECunwXftkPwyvHbclArO8wszgBGisiLeuDFwNM8ws+wKIw0sv1os3ClWZOcrEB2eRXULYUsm8OVRGJKwGA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Accueil</title>
</head>
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
            <h1>Bienvenu chez Eliace Biblio</h1>
            <p>Venez decouvrir le monde de la lecture </p>
            <p class="citation">"Un livre est un rêve que vous tenez dans vos mains." dit Neil Gaiman</p>
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