class  page_accueil {
    function page_accueil($titre)
        { $this->titre ; }
    function debut()
        {echo "<html><head>$this->titre" ;} 
    function entete()
        { echo "<meta charset='UTF-8'></head><body>" ; }
    function fin()
        {echo "</body></html>" ;}

}

$s = new page_accueil("Footix.com") ;
$s->debut() ;
$s->entete() ;
echo "<p>Sur le serveur, il est exactement ".date("H:i:s")."</p>" ;
$s->fin() ;
