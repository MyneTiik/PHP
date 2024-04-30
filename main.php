
<?php
class  page_accueil {
	public $titre = "no";
	
    function __construct($titre)
        { $this->titre ; }
    function debut()
        {echo "<html><head><link rel='stylesheet' href='css/style.css'><title>$this->titre</title>" ;} 
    function entete()
        { echo "<meta charset='UTF-8'></head><body>" ; }
    function corps()
        {echo "<h1> LE FOOT </h1>" ; }
    function fin()
        {echo "</body></html>" ;}
    

}


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
    echo "<br> fonctionne <br>";
    $db->close();



$s = new page_accueil("Footix.com") ;
$s->debut() ;
$s->entete() ;
echo "<p>Sur le serveur, il est exactement ".date("H:i:s")."</p>" ;
$s->corps();
$s->fin() ;
?>
