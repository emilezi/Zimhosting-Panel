<!-- Navigation bar -->

<nav>

    <div id='nav'>

        <ul class="topnav">

            <li class="nav"><a href="index.php">Site</a></li>
            
            <?php if((isset($_SESSION['type'])) && ($_SESSION['type'] == "admin")){echo "<li class='nav nav-active'><a href='index.php?page=admin'>Admin</a></li>";}?>
            
            <li class="nav nav-active"><a href="index.php?page=account">Compte</a></li>

        </ul>

        <form id='searchbox' method='get' action='index.php'>

            <input type="search" name='q' size='15' placeholder='Saisissez une recherche' style='width:250px;' />

            <input id='search_submit' type='submit' value='Rechercher' />

        </form>

        <a class='topnav-inactive' onclick="NavDisplay()">
        <div class='topnav-burger'>
            <div class="burger">
            <span></span>
            </div>
            </div>
        </a>

    </div>

    <ul id='navdisplay'>

    <?php if((isset($_SESSION['type'])) && ($_SESSION['type'] == "admin")){echo "<a href='index.php?page=admin'><li class='navdisplay nav-responsive-color'>Admin</li></a>";}?>
    
    <a href="index.php?page=account"><li class='navdisplay nav-responsive-color'>Compte</li></a>

    </ul>

</nav>

<script src="ressources/style/zimhosting_css/script.js"></script>