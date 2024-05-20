<?php include 'head.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'navad.php'; ?>

<?php
$tableName = $_GET['tablename'];
?>

<?php
//verifier si l'utilisateur est connecté

if ($_SESSION['pseudo'] !== 'admin') { 

    header('Location: login.php');
    exit;
}
?>

<button type="button" onclick="window.location.reload();" class="btn btn-primary btn-lg btn-block">Recharger la page</button> <h2>Supprimer des valeurs</h2>


<?php
//ouvre la base de donnée, recupère le nom de la table et affiche les données de la table

$db = new SQLite3('basefoot.sqlite');
$nom_table = $_GET['tablename'];
$requete = "SELECT * FROM $nom_table";
$results = $db->query($requete);

echo "<table class='table stripped'>";
echo "<tr>";
for ($i = 0; $i < $results->numColumns(); $i++) {
    $columnName = $results->columnName($i);
    echo "<th scope='col'>$columnName</th>";
}
echo "</tr>";

while ($row = $results->fetchArray()) {
    echo "<tr>";
    for ($i = 0; $i < $results->numColumns(); $i++) {
        echo "<td>{$row[$i]}</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>



<form action="admin_del.php?tablename=<?php echo $tableName ?>" method="GET" class="mb-3">
    <div class="input-group">
        <select name="tablename" class="form-select">
            <?php
            // Ouvre la base de données
            $db = new SQLite3('basefoot.sqlite');

            // Récupère les noms des tables de la base de données
            $results = $db->query('SELECT name FROM sqlite_master WHERE type="table"');

            // Affiche les options du menu déroulant avec les noms des tables
            while ($row = $results->fetchArray()) {
                echo "<option value=\"{$row['name']}\" style='text-align: center'>{$row['name']}</option>";
            }
            ?>
        </select>
        <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>

<h2>Supprimer des valeurs</h2>

<?php
//permet de supprimer en fonction du premier champ de la table
?>

<form method="POST" action="admin_del.php?tablename=<?php echo $tableName ?>">
    <div style="margin-bottom: 10px;">
        <label for="id">ID:</label>
        <input type="text" name="id" style="margin-left: 10px;"><br><br>
    </div>
    <input type="submit" value="Supprimer">
</form>


<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $requete = "SELECT * FROM $tableName LIMIT 1";
    $colonnes = $db->query($requete);
    $columnName = $colonnes->columnName(0);

    // Insert the values into the database
    $insertQuery = "DELETE FROM $tableName WHERE  $columnName= " . $_POST['id'];
    $db->exec($insertQuery);
    // Redirect to the admin page
    header('Location: admin_del.php?tablename=' . $tableName);
    exit;
}

?>
