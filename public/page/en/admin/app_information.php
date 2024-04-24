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
        
    echo "<h2>Application information</h2>
    <hr class='fs-large'>";

    echo "<p>Application name : ".$app['qualified_name']."</p>";

    echo "<p>Official site : <a href=".$app['source'].">".$app['source']."</a></p>";

    if($app['installed'] == 'yes'){

        if($app['db_require'] == 'yes'){

            echo "<p>Require a database : Yes</p>";
        
            echo "<p>Database assigned for the application : zimhosting_".$app['name']."</p>";

        }else{

            echo "<p>Require a database : No</p>";

        }

        echo "<p>Installed version : ".$app['version']."</p>";

        echo "<p>Installed : Yes</p>";


    }else{

        if($app['db_require'] == 'yes'){

            echo "<p>Require a database : Yes</p>";

        }else{

            echo "<p>Require a database : No</p>";

        }

        echo "<p>Version available : ".$app['version']."</p>";

        echo "<p>Installed : No</p>";

    }

    echo "<hr class='fs-small'>
    <br/>";

    if($app['installed'] == 'no'){

        echo "<form method='post'>
        <input type='submit' name='submit_install_".$app['name']."' value='Install'>
        </form>";
    
        }else{

        ?>

        <div class='center'>
        <button onclick="PopUpRadio('submit_remove_','<?=$app['name']?>')">Delete</button>
        </div>

        <?php

        echo "<script src='functions/popup.js'></script>";
    
        }

    echo "<form action='index.php?page=admin&action=store' method='post'>
    <input type='submit' name='submit_back' value='Back'>
    </form>";

    echo "</div>
    </div>";

}else{

    header('Location: index.php?page=admin');

}