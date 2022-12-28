<?php
/**
    *
    * Setting display editor
    *
    */

if(isset($_POST['submit_display_edit']) && ($User->UserSessionAdmin($db) == 0)){

    $Setting->setDisplay($db, $_POST['display_radio']);

    require 'public/page/site_element/commit_message/validated_interface_display.php';
    
}