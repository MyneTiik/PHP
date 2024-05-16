
<html>
        <head>
            <link rel='stylesheet' href='css/style.css'>
            <title>Footix.com</title>
            <meta charset='UTF-8'>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </head>
        
        <body>
        <h1 style="text-align: center;"> FOOTIX </h1>
        </body></html>

        <?php include 'nav.php'; ?>


    <?php
    $db = new SQLite3('basefoot.sqlite');

    $requete = "SELECT * FROM maillot_dom where nomequipe like '".($_GET["nomequipe"]."'");
    $results = $db->query($requete);
    $requete2 = "SELECT * FROM maillot_exte where nomequipe like '".($_GET["nomequipe"]."'");
    $results2 = $db->query($requete2);
    ?>  

    <form action="index.php" method="GET" class="mb-3">
        <div class="input-group">
            <select name="nomequipe" class="form-select">
                <?php
                $results = $db->query('SELECT * FROM maillot_exte');
                while ($row = $results->fetchArray()) {
                    echo "<option value=\"{$row['nomequipe']}\">{$row['nomequipe']}</option>";
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
    $requete2 = "SELECT * FROM maillot_exte where nomequipe like '".($_GET["nomequipe"]."'");
    $results2 = $db->query($requete2);
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
	<?php
        while ($row = $results2->fetchArray()) {
            echo "<tr>
                    <td>{$row['nomequipe']}</td>
                    <td>{$row['marque']}</td>
                    <td>{$row['prix']} &euro;</td>
                    <td><img src='{$row['im_avant']}'><img src='{$row['im_dos']}'></td>
                </tr>";
        }
        ?>

    </table>
    
                
        <footer class="bg-dark text-white text-center p-3">
            &copy; 2021 - Footix.com
