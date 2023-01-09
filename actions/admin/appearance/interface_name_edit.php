<?php
/**
    *
    * Interface name editor
    *
    */

if(isset($_POST['submit_interface_name_edit']) && ($User->UserSessionAdmin($db) == 0)){

    require 'functions/form.php';

    if($Form->FormInterfaceNameCheck($_POST) == 0){

        $Setting->setInterfaceName($db, $_POST['post_interface_name']);

        require 'public/page/site_element/commit_message/validated_interface_name_edit.php';

    }elseif($Form->FormInterfaceNameCheck($_POST) == 1){

        require 'public/page/site_element/error_message/error_form_temper.php';

    }
    
}