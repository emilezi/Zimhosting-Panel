<!-- Application information page -->

<?php

require 'functions/application.php';

$app = $Application->getApp($db,$_GET);

if($app == true){
    
    echo "<div class='right-container'>
    <div class='content-large'>";
        
    echo "<h2>Information de l'application</h2>
    <hr class='fs-large'>";

    echo "<p>Nom de l'application : ".$app['qualified_name']."</p>";

    if($app['installed'] == 'yes'){

        if($app['db_require'] == 'yes'){

            echo "<p>Requiers une base de données : Oui </p>";
        
            echo "<p>Base de données attribué pour l’application : zimhosting_".$app['name']."</p>";

        }else{

            echo "<p>Requiers une base de données : Non </p>";

        }

        echo "<p>Version installée : ".$app['version']."</p>";

        echo "<p>Installée : Oui</p>";


    }else{

        if($app['db_require'] == 'yes'){

            echo "<p>Requiers une base de données : Oui </p>";

        }else{

            echo "<p>Requiers une base de données : Non </p>";

        }

        echo "<p>Version disponible : ".$app['version']."</p>";

        echo "<p>Installée : Non</p>";

    }

    echo "</div>
    </div>";

}else{

    header('Location: index.php?page=admin');

}