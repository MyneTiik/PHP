<?php include 'head.php'; ?>
<?php include 'nav.php'; ?>



    <?php
    $db = new SQLite3('basefoot.sqlite');

    $requete = "SELECT * FROM maillot_dom where nomequipe like '".($_GET["nomequipe"]."'");
    $results = $db->query($requete);
    ?>

    <table class="table">
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

    </table>
    
    





        <div class="container">
            <?php
            $db = new SQLite3('basefoot.sqlite');

            $requete = "SELECT * FROM maillot_dom" ;
            
            $results = $db->query($requete);

            while ($row = $results->fetchArray()) {
                echo "<div class='row'>
                        <div class='col'>{$row['nomequipe']}</div>
                        <div class='col'>{$row['marque']}</div>
                        <div class='col'>{$row['prix']} &euro;</div>
                        <div class='col'><img src='{$row['im_avant']}'></div>
                    </div>";
            }
            ?>

        </div>

        <?php include 'footer.php'; ?>  