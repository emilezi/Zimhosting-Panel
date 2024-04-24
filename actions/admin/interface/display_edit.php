<?php
/**
    *
    * Setting display editor
    *
    */

if(isset($_POST['submit_display_edit']) && ($User->UserSessionAdmin($db) == 0)){

    $Setting->setDisplay($db, $_POST['display_radio']);

    if($Setting->getLanguage() == 'fr'){

        require 'public/page/fr/commit_message/validated_interface_display.php';

    }else{

        require 'public/page/en/commit_message/validated_interface_display.php';   

    }
    
}