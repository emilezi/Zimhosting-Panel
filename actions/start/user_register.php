<?php
/**
    *
    * Creation of the first user for the first connection
    *
    */

if(isset($_POST['submit_register'])){

    require 'class/Form.php';

    if($Form->FormRegisterCheck() == 0){

        if($Form->FormPasswordCheck() == 0){

        $Database -> addTables();

        $User -> UserAdd("yes","admin");

        $User -> UserLogin();

        header('Location: index.php');

        }else{

            if($Setting->getLanguage() == 'fr'){

                require 'public/page/fr/error_message/error_start_form_password_check.php';

            }else{
    
                require 'public/page/en/error_message/error_start_form_password_check.php';   
    
            }

        }

    }elseif($Form->FormRegisterCheck() == 1){

        if($Setting->getLanguage() == 'fr'){

            require 'public/page/fr/error_message/error_start_form_temper.php';

        }else{

            require 'public/page/en/error_message/error_start_form_temper.php';   

        }

    }
    
}