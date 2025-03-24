<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" integrity="sha512-kJlvECunwXftkPwyvHbclArO8wszgBGisiLeuDFwNM8ws+wKIw0sv1os3ClWZOcrEB2eRXULYUsm8OVRGJKwGA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>livre</title>
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
        <div class="titlelivre">
            <div class="search" id="search">
                <input type="text" placeholder="recherche......"><i class="ri-search-line"></i>
            </div>
            <?php
            $nom="";
            $premiernom="";
            if(isset($_SESSION['nom'])){
                $nom=substr($_SESSION['nom'],0,2);
                $premiernom=explode(" ",$_SESSION['nom'])[0];
            }
            echo"
            <button class='button'><a href='profil.php'>".$nom."</a></button>
            <h1>Bienvenue ".$premiernom.", profitez d'un monde d'immersion dans le savoir.</h1>";
            ?>
                <div class="livre" id="livre">
                    <?php
                    include_once "connexionbd.php";
                    $req=mysqli_query($conn,"SELECT * FROM books");
                    while($row=mysqli_fetch_assoc($req)){
                        $_SESSION['livre']=$row['id'];
                        
                        echo'
                    <div>
                        <p class="title"><strong>'.$row['title'].'</strong></p>
                        <img src="image/'.$row['lien'].'" alt="">
                        <p><strong>Auteur :</strong> '.$row['author'].'</p>
                        <p><strong> Description :</strong> '.$row['description'].'</p>
                        <p><strong>Année de sortie :</strong> '.$row['year'].' </p>
                        <p><strong>genre : </strong>'.$row['genre'].'</p>
                        <form action="">
                        <button id="button" type="submit" name="emprunter"><a href="reserver.php">emprunter</a></button>
                        </form>
                    </div>';
                    }
                    ?>
                </div>
                
        </div>
    </div>
    <script src="script.js"></script>
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