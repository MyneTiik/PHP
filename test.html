<?php

$db = new SQLite3('basefoot.sqlite');

$pseudo = $_GET["pseudo"];
$mdp = $_GET["mdp"];

$checkPseudo = $db->prepare('SELECT COUNT(*) FROM membres WHERE pseudo = :pseudo');
$checkPseudo->bindValue(':pseudo', $pseudo);
$result = $checkPseudo->execute();
$count = $result->fetchArray()[0];

if($count > 0){
    echo "Ce pseudo est déjà utilisé";
    exit;
}

if(!empty($pseudo) && !empty($mdp)){
    $requete = 'Insert into membres (pseudo, mdp) values (:pseudo, :mdp)';
    
    $result = $db->prepare($requete);
    $result->bindValue(':pseudo', $pseudo);
    $result->bindValue(':mdp', $mdp);

    $result->execute();
    echo "Votre compte a bien été créé";
}
else{
    echo "Veuillez remplir tous les champs";
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
