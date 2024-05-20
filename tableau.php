<?php
$db = new SQLite3('basefoot.sqlite');

$tableName_bis = $_GET['tableName_bis'];
echo "<h1 style='text-align: center'>Table: $tableName_bis</h1>";
$query = "SELECT * FROM $tableName_bis LIMIT 1";
$result = $db->query($query);
$numFields = $result->numColumns();
?>


<p>Le tableau des valeurs:</p>
    <table>
        <tr>
            <?php
            echo '<table class="table table-bordered stripped">';
            for ($i = 0; $i < $numFields; $i++) {
                $fieldName = $result->columnName($i);
                echo "<th scope='col'>$fieldName</th>";
            }
            ?>
        </tr>
        <?php
        
        $query = "SELECT * FROM $tableName_bis";
        $results = $db->query($query);
        while ($row = $results->fetchArray()) {
            echo "<tr>";
            for ($i = 0; $i < $numFields; $i++) {
                $fieldName = $result->columnName($i);
                echo "<td>{$row[$fieldName]}</td>";
            }
            echo "</tr>";
        }
        echo '</table>'
        ?>
    </table>
    </form>
