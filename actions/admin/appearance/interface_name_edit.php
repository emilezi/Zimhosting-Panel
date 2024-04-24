<?php
/**
    *
    * Interface name editor
    *
    */

if(isset($_POST['submit_interface_name_edit']) && ($User->UserSessionAdmin($db) == 0) && ($Setting->getInterfaceName($db) <> $_POST['post_interface_name'])){

    require 'functions/form.php';

    if($Form->FormInterfaceNameCheck($_POST) == 0){

        $Setting->setInterfaceName($db, $_POST['post_interface_name']);

        header('Location: index.php?page=admin&action=appearance');

    }elseif($Form->FormInterfaceNameCheck($_POST) == 1){

        if($Setting->getLanguage() == 'fr'){

            require 'public/page/fr/error_message/error_form_temper.php';

        }else{

            require 'public/page/en/error_message/error_form_temper.php';   

        }

    }
    
}