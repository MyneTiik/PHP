<?php
session_start();

if(!isset($_SESSION['pseudo'])){
    header('Location: login.php');
}

else {
    if(!isset($_SESSION['panier'])){
        $_SESSION['panier']= array();
    }

    if(isset($_GET['idequipe'])){
        
        $id = $_GET['idequipe'];
        echo 'id : '.$id.'<br>';

        $table = $_GET['nomtable'];
        echo 'table : '.$table.'<br>';
        
        echo "Le produit a bien ete mis dans le panier !";

        if(!isset($_SESSION['panier_id'])){
            $_SESSION['panier_id'] = array();
        }
        if(!isset($_SESSION['panier_equipe'])){
            $_SESSION['panier_equipe'] = array();
        }
        $_SESSION['panier_id'][] = $id;
        $_SESSION['panier_equipe'][] = $table;

        header('Location: maillot.php');

    }
}