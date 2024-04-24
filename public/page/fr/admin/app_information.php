<!-- Application information page -->

<?php

require 'functions/file.php';
require 'functions/application.php';
require 'actions/apps/app_install.php';
require 'actions/apps/app_remove.php';

$app = $Application->getApp($db,$_GET);

if($app == true){
    
    echo "<div class='right-container'>
    <div class='content-large animation-content'>";
        
    echo "<h2>Information de l'application</h2>
    <hr class='fs-large'>";

    echo "<p>Nom de l'application : ".$app['qualified_name']."</p>";

    echo "<p>Site officiel : <a href=".$app['source'].">".$app['source']."</a></p>";

    if($app['installed'] == 'yes'){

        if($app['db_require'] == 'yes'){

            echo "<p>Requiers une base de données : Oui</p>";
        
            echo "<p>Base de données attribué pour l’application : zimhosting_".$app['name']."</p>";

        }else{

            echo "<p>Requiers une base de données : Non</p>";

        }

        echo "<p>Version installée : ".$app['version']."</p>";

        echo "<p>Installée : Oui</p>";


    }else{

        if($app['db_require'] == 'yes'){

            echo "<p>Requiers une base de données : Oui</p>";

        }else{

            echo "<p>Requiers une base de données : Non</p>";

        }

        echo "<p>Version disponible : ".$app['version']."</p>";

        echo "<p>Installée : Non</p>";

    }

    echo "<hr class='fs-small'>
    <br/>";

    if($app['installed'] == 'no'){

        echo "<form method='post'>
        <input type='submit' name='submit_install_".$app['name']."' value='Installer'>
        </form>";
    
        }else{

        ?>

        <div class='center'>
        <button onclick="PopUpRadio('submit_remove_','<?=$app['name']?>')">Supprimer</button>
        </div>

        <?php

        echo "<script src='functions/popup.js'></script>";
    
        }

    echo "<form action='index.php?page=admin&action=store' method='post'>
    <input type='submit' name='submit_back' value='Retour'>
    </form>";

    echo "</div>
    </div>";

}else{

    header('Location: index.php?page=admin');

}