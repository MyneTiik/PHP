<?php include 'head.php'; ?>


<?php
    $db = new SQLite3('basefoot.sqlite'); 
    if(!$db) { 
        echo $db->lastErrorMsg();
    }   else { 
        echo "Opened database successfully<br><br>"; 
    }

    $sql = "Select nomequipe from maillot_exte;";
    $results = $db->query($sql);

    while ($row = $results->fetchArray()) {
        echo "Equipes : {$row['nomequipe']} <br>";
    }
    echo "<br> fonctionne 1 <br>";
    

    $sql = "Select im_avant from maillot_exte;";
    $results = $db->query($sql);

    while ($images = $results->fetchArray()) {
        echo "<img src='{$images['im_avant']}'>";
    }
    echo "<br> fonctionne 2 <br>";
    $db->close();


?>


<?php
        $db = new SQLite3('basefoot.sqlite');

        $requete = "SELECT * FROM maillot_dom where nomequipe like '".($_GET["nomequipe"]."'");
        echo $requete;
        $results = $db->query($requete);
    ?>  
    <table style="width: 100%;">
        <thead>
            <tr>
                <th>Equipe</th>
                <th>Marque</th>
                <th>Prix</th>
                <th>Maillot</th>
            </tr>
        </thead>

        <?php
        while ($row = $results->fetchArray()) {
            echo "<tr>
                    <td>{$row['nomequipe']}</td>
                    <td>{$row['marque']}</td>
                    <td>{$row['prix']} &euro;</td>
                    <td><img src='{$row['im_avant']}'><img src='{$row['im_dos']}'></td>
                 </tr>";
        }
        ?>

    <hr>
    <h3>Exemple liste deroulante de nomequipe</h3>


    <form action="index.php" method="GET">

    <select name="nomequipe">

        <?php
        $results = $db->query('SELECT * FROM maillot_exte');
        while ($row = $results->fetchArray()) {
            echo "<option value=\"{$row['nomequipe']}\">{$row['nomequipe']}</option>";
        }
        ?>

    </select>
 
    <input type="submit" value="Envoyer" value="submit" />
    </form>