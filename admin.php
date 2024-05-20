<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel='stylesheet' href='css/style.css'>
    <meta charset='UTF-8'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .column-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 5px;
            display: inline-block;
        }
        .input-box {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <h1>Page admin</h1>

    <h2>Liste des Membres</h2>

    <ul>
        <?php
        $db = new SQLite3('basefoot.sqlite');
        $results = $db->query('SELECT * FROM membres');
        while ($row = $results->fetchArray()) {
            echo "<li>{$row['pseudo']}</li>";
        }
        ?>
    </ul>
    
    <br>
    
    <form action="admin.php" method="GET" class="mb-3">
        <div class="input-group">
            <select name="name" class="form-select">
                <?php
                $results = $db->query('SELECT name FROM sqlite_master WHERE type="table";');
                while ($row = $results->fetchArray()) {
                    echo "<option value=\"{$row['name']}\">{$row['name']}</option>";
                }
                ?>
            </select>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>

    <?php
    try {
        if (isset($_GET['name'])) {
            $tableName = SQLite3::escapeString($_GET['name']); // Sécuriser le nom de la table
            $stmt = $db->query("PRAGMA table_info($tableName)");
            $columns = [];
            while ($row = $stmt->fetchArray(SQLITE3_ASSOC)) {
                $columns[] = $row['name'];
            }
            $columnCount = count($columns);

            echo "<p>Table choisie : $tableName</p>";

            echo "<form action='admin.php' method='POST'>";
            foreach ($columns as $column) {
                echo "<li>$column</li>";
                echo "<input type='text' name='$column' class='input-box'>";
                echo "<br>";
            }
	    echo"<br>";
            echo "<button type='submit' class='btn btn-primary'>Envoyer</button>";
            echo "</form>";
        }
    } catch (Exception $e) {
        echo "<p>Erreur : " . $e->getMessage() . "</p>";
    }
    ?>
</body>
</html>
