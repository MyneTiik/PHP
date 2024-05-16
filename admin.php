
<html>
<head>
    <title>Admin Page</title>
    <link rel='stylesheet' href='css/style.css'>
    <title>Footix.com</title>
    <meta charset='UTF-8'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <h1>Page admin</h1>


    <h2>Ajouter des valeurs</h2>

    <?php
    $db = new SQLite3('basefoot.sqlite');
    $results = $db->query('SELECT * FROM membres');
    while ($row = $results->fetchArray()) {
    	echo "<option value=\"{$row['pseudo']}\">{$row['pseudo']}</option>";
    }
    ?>  
    <br>
    <?php
    $maillot_dom = $_GET["maillot_dom"];
    $maillot_exte = $_GET["maillot_exte"];
    $membres = $_GET["membres"];
    ?> 
    <form action="admin.php" method="GET" class="mb-3">
        <div class="input-group">
            <select name="name" class="form-select">
                <?php
                $results = $db->query('select name from sqlite_master where type="table";');
                while ($row = $results->fetchArray()) {
                    echo "<option value=\"{$row['name']}\">{$row['name']}</option>";
                }
                ?>
                
            </select>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
        <?php
        $db = new SQLite3('basefoot.sqlite');
        $tables = $db->query('select name from sqlite_master where type="table";');
        
        echo "Sous tableau";
        foreach($tables as $table) {
        	echo $table['name'] . "<br>";
        }
        ?>
    </form>
	


</body>
