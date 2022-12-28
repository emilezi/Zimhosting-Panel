<?php
/**
    *
    * Editing password user information
    *
    */

if(isset($_POST['submit_user_password_edit']) && ($User->UserSessionAdmin($db) == 0)){

require 'functions/form.php';

if($Form->FormPasswordCheck($_POST) == 0){

    $user = $User->getUser($db,$_GET);

    $User -> UserPasswordEdit($db,$user,$_POST);

    header('Location: index.php?page=admin');

}else{

    require 'public/page/site_element/error_message/error_form_password_check.php';

}

}