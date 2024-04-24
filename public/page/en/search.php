<!-- Search Page -->

<?php

echo "<div class='container'>
    <div class='content-large animation-content'>";

$q = htmlspecialchars($_GET['q']);

if($_SESSION['type'] == 'admin'){

    $search_data = $db->prepare("SELECT * FROM `search_data` WHERE `category` LIKE '%".$q."%' OR `element` LIKE '%".$q."%' ORDER BY id DESC");
    $search_data->execute();

}else{

    $search_data = $db->prepare("SELECT * FROM `search_data` WHERE `category` LIKE '%".$q."%' AND type<>'admin' OR `element` LIKE '%".$q."%' AND type<>'admin' ORDER BY id DESC");
    $search_data->execute();

}

echo "<h2>Result for : ".$q."</h2>
<hr class='fs-large'>";

if($search_data->rowCount() > 0) {

    while($a = $search_data->fetch(PDO::FETCH_ASSOC)) { 
     
    echo "<h5><a href='" . $a['link'] . "'>".$a['element']."</a></h5>";
     
   }

}else{

    echo "<p>There are no results found for the search performed</p>";

}

echo "</div>
    </div>";