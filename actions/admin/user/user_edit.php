<?php
/**
    *
    * Editing user information
    *
    */

if(isset($_POST['submit_user_edit']) && ($User->UserSessionAdmin($db) == 0)){

require 'functions/form.php';

if($Form->FormAdminUserEditCheck($_POST) == 0){

    if($User -> getUser($db,$_POST) == false){

        $user = $User->getUser($db,$_GET);

        $User -> AdminUserEdit($db,$user,$_POST);

        header('Location: index.php?page=admin');

    }else{

        require 'public/page/site_element/error_message/error_user_exists.php';

    }

}else{

    require 'public/page/site_element/error_message/error_form_temper.php';

}

}