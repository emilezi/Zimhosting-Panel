<?php
/**
    *
    * Interface name editor
    *
    */

if(isset($_POST['submit_interface_name_edit']) && ($User->UserSessionAdmin() == 0) && ($Setting->getInterfaceName() <> $_POST['post_interface_name'])){

    require 'class/Form.php';

    if($Form->FormInterfaceNameCheck() == 0){

        $Setting->setInterfaceName($_POST['post_interface_name']);

        header('Location: index.php?page=admin&action=appearance');

    }elseif($Form->FormInterfaceNameCheck() == 1){

        if($Setting->getLanguage() == 'fr'){

            require 'public/page/fr/error_message/error_form_temper.php';

        }else{

            require 'public/page/en/error_message/error_form_temper.php';   

        }

    }
    
}