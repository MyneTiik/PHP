<?php include 'head.php'; ?>
<?php include 'nav.php'; ?>

<?php


$db = new SQLite3('basefoot.sqlite');

$requete = "SELECT * FROM maillot_dom where nomequipe like '".($_GET["nomequipe"]."'");
$results = $db->query($requete);
?>  

<form action="accueil.php" method="GET" class="mb-3">
    <div class="input-group">
        <select name="nomequipe" class="form-select">
            <option style='text-align: center'>Rechercher &eacute;quipe</option>
            <?php
            $results = $db->query('SELECT * FROM maillot_exte');
            while ($row = $results->fetchArray()) {
                echo "<option value=\"{$row['nomequipe']}\" style='text-align: center'>{$row['nomequipe']}</option>";
            }
            ?>
        </select>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </div>
</form>

<?php
$db = new SQLite3('basefoot.sqlite');

$requete = "SELECT * FROM maillot_dom where nomequipe like '".($_GET["nomequipe"]."'");
$results = $db->query($requete);

$requete_exte = "SELECT * FROM maillot_exte where nomequipe like '".($_GET["nomequipe"]."'");
$results_exte = $db->query($requete_exte);

echo '<div class="row justify-content-center" style="margin-bottom: 10px">';
while ($row = $results->fetchArray()) {
    echo '<div class="col-md-2">';
    echo '<div class="card">';
    echo '<div class="card-body">';
    echo "<h5 class='card-title'>{$row['nomequipe']} - Domicile</h5>";
    echo "<p class='card-text'>Marque: {$row['marque']}</p>";
    echo "<p class='card-text'>Prix: {$row['prix']} &euro;</p>";
    echo "<img src='{$row['im_avant']}' class='card-img-top' alt='Maillot avant'>";
    echo "<a href='article.php?maillot_id={$row['idequipe']}&table=maillot_dom' class='stretched-link'></a>";
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

while ($row = $results_exte->fetchArray()) {
    echo '<div class="col-md-2">';
    echo '<div class="card">';
    echo '<div class="card-body">';
    echo "<h5 class='card-title'>{$row['nomequipe']} - Ext&eacute;rieur</h5>";
    echo "<p class='card-text'>Marque: {$row['marque']}</p>";
    echo "<p class='card-text'>Prix: {$row['prix']} &euro;</p>";
    echo "<img src='{$row['im_avant']}' class='card-img-top' alt='Maillot avant'>";
    echo "<a href='article.php?maillot_id={$row['idequipe']}&table=maillot_exte' class='stretched-link'></a>";
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

echo '</div>';
?>

<?php include 'footer.php'; ?>
