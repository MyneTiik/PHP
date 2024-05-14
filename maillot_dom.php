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
                        <a class="nav-link active" aria-current="page" href="Accueil.php">Accueil</a>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Maillot Domicile</a>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="maillot_exte.php">Maillot Ext&eacuterieur</a>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                    </ul>
                </div>
            </div>
        </nav>


    <?php
    $db = new SQLite3('basefoot.sqlite');

    $requete = "SELECT * FROM maillot_dom where nomequipe like '".($_GET["nomequipe"]."'");
    $results = $db->query($requete);
    ?>  

    <form action="index.php" method="GET" class="mb-3">
        <div class="input-group">
            <select name="nomequipe" class="form-select">
                <?php
                $results = $db->query('SELECT * FROM maillot_dom');
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


                
        <footer class="bg-dark text-white text-center p-3">
            &copy; 2021 - Footix.com
