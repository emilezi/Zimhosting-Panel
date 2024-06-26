<!-- Application store page -->

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

    echo "<a href='index.php?page=admin&action=app_information&app_name=".$app_list['name']."'><img src='ressources/img/app_icon/".$app_list['category'].".png' width=192px;></a>";
    echo "<p>".$app_list['qualified_name']."</p>";

    if($app_list['installed'] == 'no'){

    echo "<form method='post'>
    <input type='submit' name='submit_install_".$app_list['name']."' value='Install'>
    </form>";

    }else{

    ?>

    <div class='center'>
    <button onclick="PopUpRadio('submit_remove_','<?=$app_list['name']?>')">Delete</button>
    </div>

    <?php

    echo "<script src='functions/popup.js'></script>";

    }

    echo "</div>
    </div>";
    
    }

}else{

    echo "<div class='siteapp'>
    <div class='app'>";

    echo "<p>There are currently no applications available in the application store</p>";

    echo "</div>
    </div>";

}

echo "</div>";

echo "</div>
</div>";

?>