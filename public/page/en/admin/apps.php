<!-- Installed apps page -->

<?php

require 'functions/file.php';
require 'functions/application.php';
require 'actions/apps/app_install.php';
require 'actions/apps/app_remove.php';

$q = $db->prepare("SELECT * FROM applications WHERE installed=:installed");
$q->execute([
'installed' => "yes"
]);

echo "<div class='right-container'>
    <div class='content-large'>";
    
echo "<div class='boxapp'>";

if($q->rowCount() > 0){

    while($app_list = $q->fetch(PDO::FETCH_ASSOC)){

    echo "<div class='siteapp'>
    <div class='app'>";

    echo "<a href='index.php?page=admin&action=app_information&app_name=".$app_list['name']."'><img src='ressources/img/app_icon/".$app_list['category'].".png' width=192px;></a>";
    echo "<p>".$app_list['qualified_name']."</p>";

    ?>

    <div class='center'>
    <button onclick="PopUpRadio('submit_remove_','<?=$app_list['name']?>')">Delete</button>
    </div>

    <?php

    echo "<script src='functions/popup.js'></script>";

    echo "</div>
    </div>";
    
    }

}else{

    echo "<div class='siteapp'>
    <a href='index.php?page=admin&action=store'>
    <div class='app app-hover'>";

    echo "<img src='ressources/img/app_icon/app_install.png' width=192px;>";
    echo "<p>Install an app</p>";

    echo "</div>
    </a>
    </div>";

}

echo "</div>";

echo "</div>
</div>";

?>