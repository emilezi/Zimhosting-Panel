<!-- Application content page -->

<?php

if((isset($_SESSION['type'])) && ($_SESSION['type'] == "admin")){

    $q = $db->prepare("SELECT * FROM applications WHERE installed=:installed");
    $q->execute(['installed' => 'yes']);

}else{

    $q = $db->prepare("SELECT * FROM applications WHERE installed=:installed AND category<>:category");
    $q->execute([
    'installed' => 'yes',
    'category' => 'tool',
    ]);

}

echo "<div class='container'>
    <div class='content-large animation-content'>";

echo "<div class='app-center'>
    <div class='boxapp'>";

if($q->rowCount() > 0){

    while($app_list = $q->fetch(PDO::FETCH_ASSOC)){

        echo "<div class='siteapp'>
        <a href='apps/".$app_list['name']."'>
        <div class='app app-hover'>";
    
        echo "<img src='ressources/img/app_icon/".$app_list['category'].".png' width=192px;>";
        echo "<p>".$app_list['qualified_name']."</p>";
    
        echo "</div>
        </a>
        </div>";
    
    }

}elseif((isset($_SESSION['type'])) && ($_SESSION['type'] == "admin")){

    echo "<div class='siteapp'>
    <a href='index.php?page=admin&action=store'>
    <div class='app app-hover'>";

    echo "<img src='ressources/img/app_icon/app_install.png' width=192px;>";
    echo "<p>Install an app</p>";

    echo "</div>
    </a>
    </div>";

}else{

    echo "<div class='siteapp'>
    <div class='app'>";

    echo "<p>No apps installed yet. To install it, please contact the system administrator</p>";

    echo "</div>
    </div>";

}

echo "</div>
    </div>";

echo "</div>
    </div>";

?>