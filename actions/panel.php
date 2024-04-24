<?php
/**
    *
    * This file contains all the function calls concerning the verification of the database, the verification of the active user and contains all the redirections of the application
    *
    */

session_start();

include 'public/site/high_page.php';

if($Database->CheckConnection() == 0) {

    if($Database->DatabaseCheck() == 0) {

        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=zimhosting", USER, PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        global $db;

        if($Database->CheckTables($db) == 0) {

            if($Setting->getLanguage() == 'fr'){

                if($User->UserSession($db) == 0) {

                    require 'public/site/header.php';
    
                    require 'public/site/fr/nav_bar.php';
    
                    if(isset($_GET['page']) && !empty($_GET['page'])) {
    
                        if($_GET['page'] == "admin" && $_SESSION['type'] == 'admin') {
    
                            require 'actions/redirect/admin.php';
    
                        }elseif($_GET['page'] == "account") {
    
    
                            require 'actions/redirect/user.php';
    
                        }else{
    
                            require 'public/page/fr/apps.php';
    
                        }
    
                    }elseif(isset($_GET['q']) && !empty($_GET['q'])) {
    
                        require 'public/page/fr/search.php';
    
                    }else{
    
                        require 'public/page/fr/apps.php';
    
                    }
    
    
                }elseif($User->UserSession($db) == 1) {
    
                    if($Setting->getDisplay($db) == 'public'){
    
                        if(isset($_GET['page']) && !empty($_GET['page']) || isset($_GET['q'])){
    
                            require 'actions/redirect/start.php';
    
                        }else{
    
                            require 'public/site/header.php';
    
                            require 'public/site/fr/nav_bar.php';
            
                            require 'public/page/fr/apps.php';
    
                        }
    
                    }else{
    
                        if(isset($_GET['action']) && !empty($_GET['action']) && ($_GET['action'] == 'database_user_created')){
                            
                            require 'public/page/fr/start/database_user_created.php';
                            
                        }else{
                            
                            require 'actions/redirect/start.php';
                            
                        }
    
                    }
    
                }elseif($User->UserSession($db) == 2) {
    
                    session_destroy();
    
                    header('Location: index.php');
    
                }elseif($User->UserSession($db) == 3) {
    
                    session_destroy();
    
                    header('Location: index.php');
    
                }

            }else{
    
                if($User->UserSession($db) == 0) {

                    require 'public/site/header.php';
    
                    require 'public/site/en/nav_bar.php';
    
                    if(isset($_GET['page']) && !empty($_GET['page'])) {
    
                        if($_GET['page'] == "admin" && $_SESSION['type'] == 'admin') {
    
                            require 'actions/redirect/admin.php';
    
                        }elseif($_GET['page'] == "account") {
    
    
                            require 'actions/redirect/user.php';
    
                        }else{
    
                            require 'public/page/en/apps.php';
    
                        }
    
                    }elseif(isset($_GET['q']) && !empty($_GET['q'])) {
    
                        require 'public/page/en/search.php';
    
                    }else{
    
                        require 'public/page/en/apps.php';
    
                    }
    
    
                }elseif($User->UserSession($db) == 1) {
    
                    if($Setting->getDisplay($db) == 'public'){
    
                        if(isset($_GET['page']) && !empty($_GET['page']) || isset($_GET['q'])){
    
                            require 'actions/redirect/start.php';
    
                        }else{
    
                            require 'public/site/header.php';
    
                            require 'public/site/en/nav_bar.php';
            
                            require 'public/page/en/apps.php';
    
                        }
    
                    }else{
    
                        if(isset($_GET['action']) && !empty($_GET['action']) && ($_GET['action'] == 'database_user_created')){
                            
                            require 'public/page/en/start/database_user_created.php';
                            
                        }else{
                            
                            require 'actions/redirect/start.php';
                            
                        }
    
                    }
    
                }elseif($User->UserSession($db) == 2) {
    
                    session_destroy();
    
                    header('Location: index.php');
    
                }elseif($User->UserSession($db) == 3) {
    
                    session_destroy();
    
                    header('Location: index.php');
    
                }
    
            }

        }else{

            if($Setting->getLanguage() == 'fr'){

                if(isset($_GET['action']) && !empty($_GET['action']) && ($_GET['action'] == 'user_register')){

                    require 'actions/start/user_register.php';
                    
                    require 'public/page/fr/start/user_register.php';
                
                }else{
                
                    require 'public/page/fr/start/database_created.php';
                
                }

            }else{
    
                if(isset($_GET['action']) && !empty($_GET['action']) && ($_GET['action'] == 'user_register')){

                    require 'actions/start/user_register.php';
                    
                    require 'public/page/en/start/user_register.php';
                
                }else{
                
                    require 'public/page/en/start/database_created.php';
                
                }   
    
            }

        }



    }else{

        if($Setting->getLanguage() == 'fr'){

            require 'actions/start/new_database.php';

            require 'public/page/fr/start/new_database.php';

        }else{

            require 'actions/start/new_database.php';

            require 'public/page/en/start/new_database.php';   

        }
    
    }

}else{

    if($Setting->getLanguage() == 'fr'){

        require 'public/page/fr/start/database_connection_error.php';

    }else{

        require 'public/page/en/start/database_connection_error.php';   

    }

}

include 'public/site/down_page.php';

?>