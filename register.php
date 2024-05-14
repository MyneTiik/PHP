<?php

$db = new SQLite3('basefoot.sqlite');

$pseudo = $_GET["pseudo"];
$mdp = $_GET["mdp"];

if(!empty($pseudo) && !empty($mdp)){
    $requete = 'Insert into membres (pseudo, mdp) values (:pseudo, :mdp)';
    
    $statement = $db->prepare($requete);
    $statement->bindValue(':pseudo', $pseudo);
    $statement->bindValue(':mdp', $mdp);

    $statement->execute();
    echo "Votre compte a bien été créé";
}

?>



<!DOCTYPE html>
<html>
<head>
    <title>Page d'enregistrement</title>
</head>
<body>
    <h2>Creaigu;ation de compte</h2>
    <form method="GET" class="mb-3">
        <label for="username">Pseudo:</label>
        <input type="text" name="pseudo" id="pseudo" required><br><br>
    
        <label for="password">Mot de passe:</label>
        <input type="password" name="mdp" id="mdp" required><br><br>
        
        <input type="submit" value="S'enregistrer">
    </form>
</body>
</html>
