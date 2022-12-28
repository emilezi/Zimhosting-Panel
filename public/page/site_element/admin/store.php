<?php

require 'functions/file.php';
require 'functions/application.php';
require 'actions/apps/app_install.php';
require 'actions/apps/app_remove.php';

$q = $db->prepare("SELECT * FROM applications WHERE 1");
$q->execute();

echo "<div class='right-container'>
    <div class='content-large'>";

echo "<div class='boxapp'>";

if($q->rowCount() > 0){

    while($app_list = $q->fetch(PDO::FETCH_ASSOC)){

    echo "<div class='siteapp'>
    <div class='app'>";

    echo "<img src='ressources/img/app_icon/".$app_list['category'].".png' width=192px;>";
    echo "<p>".$app_list['qualified_name']."</p>";

    if($app_list['installed'] == 'no'){

    echo "<form method='post'>
    <input type='submit' name='submit_install_".$app_list['name']."' value='Installer'>
    </form>";

    }else{

    echo "<form method='post'>
    <input type='submit' name='submit_remove_".$app_list['name']."' value='Supprimer'>
    </form>";

    }

    echo "</div>
    </div>";
    
    }

}else{

    echo "<div class='siteapp'>
    <div class='app'>";

    echo "<p>Il n'y a pour l’instant aucune application disponible sur le store d'applications</p>";

    echo "</div>
    </div>";

}

echo "</div>";

echo "</div>
</div>";

?>