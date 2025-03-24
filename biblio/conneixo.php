<?php
    $con=New PDO("mysql:host=localhost;dbname=biblio;charset=utf8","root","");
    if($con){
        echo "bonjour";
    }
?>