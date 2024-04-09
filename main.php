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

$s = new page_accueil("Footix.com") ;
$s->debut() ;
$s->entete() ;
echo "<p>Sur le serveur, il est exactement ".date("H:i:s")."</p>" ;
$s->corps();
$s->fin() ;
