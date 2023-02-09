<?php
/**
    *
    * Account deletion
    *
    */

if((isset($_POST['submit_user_delete'])) && (isset($_POST['delete_radio'])) && ($_POST['delete_radio'] == 'yes') && ($User->UserSession($db) == 0)){

    if($User -> UserDelete($db,$_SESSION) == 0){

        session_destroy();

        require 'public/page/site_element/commit_message/validated_user_delete.php';

        header('Location: index.php?page=user');

    }else{

        require 'public/page/site_element/error_message/error_user_delete.php';

    }

}