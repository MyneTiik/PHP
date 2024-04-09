class  page_accueil {
    function page_accueil($titre)
        { $this->titre ; }
    function debut()
        {echo "<html lang="fr"><head>$this->titre <meta charset="UTF-8"></head><body>"} 
    function fin()
        {echo "</body></html>"}

}

$s = new page_accueil("Footix.com") ;
$s->debut() ;
echo "<p>Sur le serveur, il est exactement ".date("H:i:s")."</p>" ;
$s->fin() ;
