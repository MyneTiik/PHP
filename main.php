<?php
class  page_accueil {
	public $titre = "no";
	
    function page_accueil($titre)
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


$db = new SQLite3('baseDD.db'); 
if(!$db) { echo $db->lastErrorMsg();
    } 
else { echo "Opened database successfully<br><br>"; 
    

    $sql = 'Select idequipe from maillot_exte;';
    $results = $db->query($sql);

    foreach($results as $row) {
        echo "<li>" . $row['idequipe'] . "</li>";
    }
}

$s = new page_accueil("Footix.com") ;
$s->debut() ;
$s->entete() ;
echo "<p>Sur le serveur, il est exactement ".date("H:i:s")."</p>" ;
$s->corps();
$s->fin() ;

