<?php include 'head.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'navad.php'; ?>


<?php
//verifier si l'utilisateur est connecté

if ($_SESSION['pseudo'] !== 'admin') { 

    header('Location: login.php');
    exit;
}
?>

<button type="button" onclick="window.location.reload();" class="btn btn-primary btn-lg btn-block">Recharger la page</button> <h2>ajouter des valeurs</h2>


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

<h1 style="text-align: center">Page admin</h1>


<form action="admin.php?tablename=<?php echo $tableName ?>" method="GET" class="mb-3">
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


    <?php
    $tableName = $_GET['tablename'];
    $query = "SELECT * FROM $tableName LIMIT 1";
    $result = $db->query($query);
    $numFields = $result->numColumns();
    ?>

    <h2>Ajouter des valeurs</h2>

    <form method="POST" action="admin.php?tablename=<?php echo $tableName ?>">
        <div style="margin-bottom: 10px;">
            <?php
            $champs = [];
            for ($i = 0; $i < $numFields; $i++) {
                $fieldName = $result->columnName($i);
                echo "<label>$fieldName:</label>";
                echo "<input type='text' name='$fieldName' style='margin-left: 10px;'><br><br>";
                $champs[] = $fieldName;
            }
            ?>
        </div>
        <input type="submit" value="Ajouter">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $values = [];
        for ($i = 0; $i < count($champs); $i++) {
            $fieldName = $champs[$i];
            $value = $_POST[$fieldName];
            $values[] = $value;
        }
        // Insert the values into the database
        $insertQuery = "INSERT INTO $tableName VALUES ('" . implode("','", $values) . "')";
        $db->exec($insertQuery);
        // reload to the admin page
        header('Location: admin.php?tablename=' . $tableName);
        exit;
    }
    ?>