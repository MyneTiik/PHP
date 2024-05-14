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

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Footix.com</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                    </ul>
                </div>
		<div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="maillot_dom.php">Maillot Domicile</a>
                    </ul>
                </div>
		<div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="maillot_exte.php">Maillot Ext&eacuterieur</a>
                    </ul>
                </div>
            </div>
        </nav>


    <?php
    $db = new SQLite3('basefoot.sqlite');

    $requete = "SELECT * FROM maillot_dom where nomequipe like '".($_GET["nomequipe"]."'");
    $results = $db->query($requete);
    ?>  


    <?php
    $db = new SQLite3('basefoot.sqlite');

    $requete = "SELECT * FROM maillot_dom where nomequipe like '".($_GET["nomequipe"]."'");
    $results = $db->query($requete);
    ?>



        <?php
        $db = new SQLite3('basefoot.sqlite');

        $requete = "SELECT * FROM maillot_dom";
        echo $requete;
        $results = $db->query($requete);

        $count = 0;

        while ($row = $results->fetchArray()) {
            if ($count % 3 == 0) {
                echo "<div class='row'>";
            }

            echo "<div class='col'>
                    <div class='card' style='width: 18rem;'>
                        <img src='{$row['im_avant']}' class='card-img-top'>
                        <div class='card-body'>
                            <p class='card-text'>{$row['nomequipe']}</p>
                            <p class='card-text'>{$row['prix']}</p>
                        </div>
                    </div>
                </div>";

            $count++;

            if ($count % 3 == 0) {
                echo "</div><br><br>";
            }
        }

        if ($count % 3 != 0) {
            echo "</div><br><br>";
        }
        ?>
                
        <footer class="bg-dark text-white text-center p-3">
            &copy; 2021 - Footix.com