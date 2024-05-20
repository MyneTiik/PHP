<?php include 'head.php'; ?>
<?php include 'nav.php'; ?>

<?php
$db = new SQLite3('basefoot.sqlite');
$total = 0 ; 

if(isset($_GET['del'])) {
    $id = $_GET['del'];
    $index = array_search($id, $_SESSION['panier_id']);
    if($index !== false) {
        unset($_SESSION['panier_id'][$index]);
        unset($_SESSION['panier_equipe'][$index]);
        // Reindex the arrays
        $_SESSION['panier_id'] = array_values($_SESSION['panier_id']);
        $_SESSION['panier_equipe'] = array_values($_SESSION['panier_equipe']);
    }
}

echo "<table class='table table-bordered'>";

if (!isset($_SESSION['panier_id']) || empty($_SESSION['panier_id']))
    {
    echo "<tr><td colspan='7'>Votre panier est vide</td></tr>";
    }
else
    {
    for($i = 0; $i < count($_SESSION['panier_id']); $i++) {
        $id = $_SESSION['panier_id'][$i];
        $equipe = $_SESSION['panier_equipe'][$i];

        if(empty($equipe)) {
            continue; // Skip this iteration if $equipe is empty
        }

        $produits = $db->query("SELECT * FROM `$equipe` WHERE idequipe = $id");

        if($produits === false) {
            continue; // Skip this iteration if the query failed
        }

        while($row = $produits->fetchArray()) {
            $total = ($row['prix'])+$total;
            
            echo  "<tr>";
            echo "<td>{$row['nomequipe']}</td>" ;
            echo "<td>{$row['marque']}</td>";
            echo "<td>{$row['prix']}</td>";
            echo '<td><img src="' . $row['im_avant'] . '" height="150" width="200%" class="card-img-top" alt="..." /></td>';
            echo '<td><a href="panier.php?del='.$id.'" onclick="return confirm(\'Voulez vous vraiment supprimer ce produit\');" class="btn btn-primary btn-sm">Supprimer</a></td>';
            echo '</tr>';
        }
    }
}
echo "</table>";
echo "<table>";
?>
<tr>
<th colspan="5" class="total">Total: <?=$total?> euros</th>
<td><a href="passercommande.php" onclick="return confirm('Voulez vous vraiment passer la commande');" class="btn btn-primary btn-sm">Passer la commande</a></td>
</tr>
</table>