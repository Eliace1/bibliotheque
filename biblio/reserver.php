<?php
    include_once "connexionbd.php";
    session_start();
    if(isset($_SESSION['id'])){
        $id=$_SESSION['id'];
        $id_livre=$_SESSION['livre'];
        mysqli_query($conn,"INSERT into emprunt values(null,'$id_livre','$id')");
        header("location:livre.php");
    }else{
        header("location:connexion.php");
    }
?>