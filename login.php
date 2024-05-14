<?php

session_start();

$sql = new SQLite3('basefoot.sqlite');

if(isset($_POST['connexion'])){
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    if(!empty($pseudo) AND !empty($mdp)){

      $requete = $sql->prepare('SELECT * FROM membres WHERE pseudo=:pseudo and mdp=:mdp');
      $requete->bindValue(':pseudo', $pseudo);
      $requete->bindValue(':mdp', $mdp);
      $result = $requete->execute();
      if($userexist == 1){
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mdp'] = $userinfo['mdp'];
         header("Location: index.php?id=".$_SESSION['id']);
      } else {
         $erreur = "Mauvais pseudo ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
    }

}

?>


<html>
<head>
   <meta charset="utf-8">
</head>

<body>
   <div>
      <h2>Connexion</h2>
      <br /><br />
      <form method="POST" action="">
         <input type="text" name="pseudo" />
         <input type="password" name="mdp" />
         <br /><br />
         <input type="submit" name="connexion" value="Se connecter !" />
      </form>
   </div>
</body>
</html>
