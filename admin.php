<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php include 'head.php'; ?>
<?php include 'nav.php'; ?>

<?php
$tableName = 'membres';

if ($_SESSION['pseudo'] !== 'admin') { 

    header('Location: login.php');
    exit;
}
?>

<?php
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

<h2>Ajouter des valeurs</h2>

<form action="admin.php" method="GET" class="mb-3">
    <div class="input-group">
        <select name="tablename" class="form-select">
            <?php
            $db = new SQLite3('basefoot.sqlite');
            $results = $db->query('SELECT name FROM sqlite_master WHERE type="table"');
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

echo "Number of fields to fill: $numFields";
?>

<form method="POST" action="admin.php">
    <div style="margin-bottom: 10px;">
        <?php
        for ($i = 0; $i < $numFields; $i++) {
            $fieldName = $result->columnName($i);
            echo "<label>$fieldName:</label>";
            echo "<input type='text' name='$fieldName' style='margin-left: 10px;'><br><br>";
            ${$fieldName} = $fieldName;
        }
        ?>
    </div>
    <input type="submit" value="Ajouter">
</form>

