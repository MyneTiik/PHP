<?php
session_start();

// Inclure les fichiers nécessaires
include 'head.php';
include 'nav.php';
?>
<div class="container">
    <h2>Laisser votre commentaire :</h2>
    <form method="post" action="test.php">
        <input type="text" style="width: 1000px; font-size: 15px; padding: 7px;" name="commentaire" value="" />
        <button type="submit" class="btn btn-primary">Envoyer votre commentaire</button>
    </form>
</div>
<br>
<?php include 'footer.php'; ?>

