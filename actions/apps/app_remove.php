<?php
/**
    *
    * Applications delete
    *
    */

$q2 = $db->prepare("SELECT * FROM applications WHERE installed=:installed");
$q2->execute(['installed' => 'yes']);

while($app_list_remove = $q2->fetch(PDO::FETCH_ASSOC)){

    if((isset($_POST['submit_remove_'.$app_list_remove['name']])) && ($User->UserSessionAdmin($db) == 0)){

        $File -> DirectoryDelete('apps/'.$app_list_remove['name']);

        $Application -> AppRemove($db,$app_list_remove);
        
    }

}