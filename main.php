<?php
class  page_accueil {
	public $titre = "no";
	
    function page_accueil($titre)
        { $this->titre ; }
    function debut()
        {echo "<html><head><title>$this->titre</title>" ;} 
    function entete()
        { echo "<meta charset='UTF-8'></head><body>" ; }
    function corps()
        {echo "<h1> LE FOOT </h1>" ; }
    function fin()
        {echo "</body></html>" ;}
    

}

$dbh = new PDO('sqlite:baseDD.db') or die("impossible d'ouvrir la base sqlite");
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['name'])) {
        $stmt = $dbh->prepare("INSERT INTO baseDD (name) VALUES (?);");
        $stmt->execute([$_POST['name']]);
}

foreach ($dbh->query("select name from baseDD;") as $row) {
        echo "<li>$row[0]</li>";
}



$s = new page_accueil("Footix.com") ;
$s->debut() ;
$s->entete() ;
echo "<p>Sur le serveur, il est exactement ".date("H:i:s")."</p>" ;
$s->corps();
$s->fin() ;

?>
