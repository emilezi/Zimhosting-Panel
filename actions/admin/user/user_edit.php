<?php
/**
    *
    * Editing user information
    *
    */

if(isset($_POST['submit_user_edit']) && ($User->UserSessionAdmin() == 0)){

require 'class/Form.php';

if($Form->FormAdminUserEditCheck() == 0){

    if($User -> getUserNandIdentifierEmail() == false){

        $user = $User->getUserId();

        $User -> AdminUserEdit($user);

        header('Location: index.php?page=admin&action=users');

    }else{

        if($Setting->getLanguage() == 'fr'){

            require 'public/page/fr/error_message/error_user_exists.php';

        }else{

            require 'public/page/en/error_message/error_user_exists.php';   

        }

    }

}else{

    if($Setting->getLanguage() == 'fr'){

        require 'public/page/fr/error_message/error_form_temper.php';

    }else{

        require 'public/page/en/error_message/error_form_temper.php';   

    }

}

}