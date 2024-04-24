<?php
/**
    *
    * start page redirect setting
    *
    */

if($Setting->getLanguage() == 'fr'){

    if (isset($_GET['page']) && !empty($_GET['page'])){

        if($_GET['page'] == "user_recovery"){
    
            require 'actions/start/user_recovery.php';
    
            require 'public/page/fr/start/user_recovery.php';
    
        }elseif(($_GET['page'] == "user_password_recovery") && (isset($_GET['get1'])) && (!empty($_GET['get1'])) && (isset($_GET['get2'])) && (!empty($_GET['get2'])) && ($User->getUser($db, $_GET) == TRUE)) {
    
            require 'actions/start/user_password_recovery.php';
    
            require 'public/page/fr/start/user_password_recovery.php';
    
        }else{
    
            require 'actions/start/user_login.php';
    
            require 'public/page/fr/start/user_login.php';
    
        }
    
    }else{
    
        require 'actions/start/user_login.php';
    
        require 'public/page/fr/start/user_login.php';
    
    }   

}else{

    if (isset($_GET['page']) && !empty($_GET['page'])){

        if($_GET['page'] == "user_recovery"){
    
            require 'actions/start/user_recovery.php';
    
            require 'public/page/en/start/user_recovery.php';
    
        }elseif(($_GET['page'] == "user_password_recovery") && (isset($_GET['get1'])) && (!empty($_GET['get1'])) && (isset($_GET['get2'])) && (!empty($_GET['get2'])) && ($User->getUser($db, $_GET) == TRUE)) {
    
            require 'actions/start/user_password_recovery.php';
    
            require 'public/page/en/start/user_password_recovery.php';
    
        }else{
    
            require 'actions/start/user_login.php';
    
            require 'public/page/en/start/user_login.php';
    
        }
    
    }else{
    
        require 'actions/start/user_login.php';
    
        require 'public/page/en/start/user_login.php';
    
    }   

}