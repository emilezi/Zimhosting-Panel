<?php
/**
    *
    * Applications installer
    *
    */

$q1 = $db->prepare("SELECT * FROM applications WHERE installed=:installed");
$q1->execute(['installed' => 'no']);

while($app_list_install = $q1->fetch(PDO::FETCH_ASSOC)){

    if((isset($_POST['submit_install_'.$app_list_install['name']])) && ($User->UserSessionAdmin($db) == 0)){

        if($File->CheckWriteability() == 0){

            if($Application->CheckPackage($app_list_install) == 0){

                $Application -> AppInstall($db,$app_list_install);
    
            }else{

                require 'public/page/site_element/error_message/error_apps_package.php';
    
            }

        }else{

            require 'public/page/site_element/error_message/error_writeability.php';

        }
        
    }

}