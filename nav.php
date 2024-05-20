
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Footix.com</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="accueil.php">Accueil</a>
                    </ul>
                </div>
		<div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="maillot.php">Maillots</a>
                    </ul>
                </div>
                <?php 
                
                if (!isset($_SESSION['pseudo'])) {
                echo '<div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                    </li>
                </ul>
            </div>';
                }

                if (isset($_SESSION['pseudo'])) {
                    echo '<div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="logout.php">D&eacute;connexion</a>
                            </li>
                        </ul>
                        </div>
                    </div>';

                    echo '<div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <li class="nav-item">
                                    <p class="nav-link active" aria-current="page">Connect&eacute; : ', $_SESSION["pseudo"],'</p>
                                </li>
                        </ul>
                    </div>';
                    }
                if ($_SESSION['pseudo'] == 'admin') {
                    echo '<div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="admin.php?tablename=membres">Admin</a>
                            </li>
                        </ul>
                    </div>';
                }
                if (isset($_SESSION['pseudo'])) {
                    echo '<div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="panier.php">Panier</a>
                            </li>
                        </ul>
                        </div>
                    </div>';
                }
                ?>
        </nav>