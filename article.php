<?php include 'head.php'; ?>
<?php include 'nav.php'; ?>

<?php
$db = new SQLite3('basefoot.sqlite');

$id = $_GET['maillot_id'];
$table = $_GET['table'];
    
$results = $db->query("SELECT * FROM $table WHERE idequipe = $id");
while ($row = $results->fetchArray()){
    echo "<div class='container'>";
    echo "<div class='row'>";
    echo "<div class='col-md-6 offset-md-3'>";
    echo "<div class='card'>";
    echo "<div class='card-body'>";
    echo "<h1 class='card-title'>{$row['nomequipe']} - Ext&eacute;rieur</h1>";
    echo "<p class='card-text'>Marque: {$row['marque']}</p>";
    echo "<p class='card-text'>Prix: {$row['prix']} &euro;</p>";
    echo "<div class='image-container' style='text-align: center;'>";
    echo "<img src='{$row['im_avant']}' class='card-img-top' alt='Maillot avant' style='width: 30%; border: 1px solid black;'>";
    echo "<img src='{$row['im_dos']}' class='card-img-top' alt='Maillot dos' style='width: 30%; border: 1px solid black;'>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    
    echo "<div>";
    echo "<td style='vertical-align: middle;'><a class='btn btn-primary' href='ajouter_panier.php?idequipe={$row["idequipe"]}&nomtable={$row["table_name"]}'>Panier</a></td>";
    echo "</div>";
}
?>

<?php include 'footer.php'; ?>