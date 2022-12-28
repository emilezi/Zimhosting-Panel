<?php
/**
    *
    * Creating a new user password
    *
    */

if(isset($_POST['submit_user_password_recovery'])){

require 'functions/form.php';

if($Form->FormPasswordCheck($_POST) == 0){

    $user = $User->getUser($db,$_GET);

    $User -> UserPasswordEdit($db,$user,$_POST);

    $User -> UserRecoveryKey($db,$user);

    require 'public/page/site_element/commit_message/validated_start_user_edit_password.php';

    header('Location: index.php');

}else{

    require 'public/page/site_element/error_message/error_start_form_password_check.php';

}

}