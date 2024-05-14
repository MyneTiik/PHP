
<html>
<head>
    <title>Admin Page</title>
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
 
 	
