<?php
/**
    *
    * Creation of the first user for the first connection
    *
    */

if(isset($_POST['submit_register'])){

    require 'functions/form.php';

    if($Form->FormRegisterCheck($_POST) == 0){

        if($Form->FormPasswordCheck($_POST) == 0){

        $Database -> addTables($db);

        $User -> UserAdd($db,$_POST,"yes","admin");

        header('Location: index.php?action=database_user_created');

        }else{

            require 'public/page/site_element/error_message/error_start_form_password_check.php';

        }

    }elseif($Form->FormRegisterCheck($_POST) == 1){

        require 'public/page/site_element/error_message/error_start_form_temper.php';

    }
    
}