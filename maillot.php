<?php include 'head.php'; ?>
<?php include 'nav.php'; ?>

<?php
$db = new SQLite3('basefoot.sqlite');
?>

<div class="container">
    <div class="row">
        <div class="col">
            <a class="btn btn-primary btn-lg rounded-pill" href="?tri=argent_croissant">Argent Croissant</a>
        </div>
        <div class="col">
            <a class="btn btn-primary btn-lg rounded-pill" href="?tri=argent_decroissant">Argent Décroissant</a>
        </div>
        <div class="col">
            <a class="btn btn-primary btn-lg rounded-pill" href="?tri=nomequipe">Tri par Nom</a>
        </div>
        <div class="col">
            <a class="btn btn-primary btn-lg rounded-pill" href="?tri">Tous les Maillots</a>
        </div>
    </div>
</div>


<?php
if (isset($_GET['tri'])) {
    if ($_GET['tri'] == 'argent_croissant') {
        $requete = "SELECT *, 'maillot_exte' as table_name FROM maillot_exte UNION SELECT *, 'maillot_dom' as table_name FROM maillot_dom ORDER BY prix ASC";
    } elseif ($_GET['tri'] == 'argent_decroissant') {
        $requete = "SELECT *, 'maillot_exte' as table_name FROM maillot_exte UNION SELECT *, 'maillot_dom' as table_name FROM maillot_dom ORDER BY prix DESC";
    } elseif ($_GET['tri'] == 'nomequipe') {
        $requete = "SELECT *, 'maillot_exte' as table_name FROM maillot_exte UNION SELECT *, 'maillot_dom' as table_name FROM maillot_dom ORDER BY nomequipe ASC";
    } else {
        $requete = "SELECT *, 'maillot_exte' as table_name FROM maillot_exte UNION SELECT *, 'maillot_dom' as table_name FROM maillot_dom";
    }
} else {
    $requete = "SELECT *, 'maillot_exte' as table_name FROM maillot_exte UNION SELECT *, 'maillot_dom' as table_name FROM maillot_dom";
}

$results = $db->query($requete);

echo "<table class='table'>
        <thead>
            <tr>
            <th>Nom Equipe</th>
            <th>Marque</th>
            <th>Prix</th>
            <th>Image</th>
            <th></th>
            </tr>
        </thead>
        <tbody>";
    while ($row = $results->fetchArray()) {
        echo "<tr>
            <td style='vertical-align: middle;'>{$row['nomequipe']}</td>
            <td style='vertical-align: middle;'>{$row['marque']}</td>
            <td style='vertical-align: middle;'>{$row['prix']} &euro;</td>
            <td style='vertical-align: middle;'><img src='{$row['im_avant']}'></td>
            <td style='vertical-align: middle;'><a class='btn btn-primary' href='ajouter_panier.php?idequipe={$row["idequipe"]}&nomtable={$row["table_name"]}'>Panier</a></td>
        </tr>";
    }

    echo "</tbody>
        </table>";
?>
