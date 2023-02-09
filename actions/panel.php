<?php
/**
    *
    * This file contains all the function calls concerning the verification of the database, the verification of the active user and contains all the redirections of the application
    *
    */

include 'public/page/page_element/high_page.php';

if ($Database->CheckConnection() == 0) {

    if ($Database->DatabaseCheck() == 0) {

        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=zimhosting", USER, PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        global $db;

        if ($Database->CheckTables($db) == 0) {

            session_start();

            if($User->UserSession($db) == 0) {

                require 'public/page/page_element/header.php';

                require 'public/page/page_element/nav_bar.php';

                if(isset($_GET['page']) && !empty($_GET['page'])) {

                    if($_GET['page'] == "admin" && $_SESSION['type'] == 'admin') {

                        require 'actions/redirect/admin.php';

                    }elseif($_GET['page'] == "account") {


                        require 'actions/redirect/user.php';

                    }else{

                        require 'public/page/site_element/apps.php';

                    }

                }elseif(isset($_GET['q']) && !empty($_GET['q'])) {

                    require 'public/page/site_element/search.php';

                }else{

                    require 'public/page/site_element/apps.php';

                }


            }elseif($User->UserSession($db) == 1) {

                if($Setting->getDisplay($db) == 'public'){

                    if(isset($_GET['page']) && !empty($_GET['page']) || isset($_GET['q'])){

                        require 'actions/redirect/start.php';

                    }else{

                        require 'public/page/page_element/header.php';

                        require 'public/page/page_element/nav_bar.php';
        
                        require 'public/page/site_element/apps.php';

                    }

                }else{

                    if(isset($_GET['action']) && !empty($_GET['action']) && ($_GET['action'] == 'database_user_created')){
                        
                        require 'public/page/site_element/start/database_user_created.php';
                        
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

            if(isset($_GET['action']) && !empty($_GET['action']) && ($_GET['action'] == 'user_register')){

                require 'actions/start/user_register.php';
                
                require 'public/page/site_element/start/user_register.php';
            
            }else{
            
                require 'public/page/site_element/start/database_created.php';
            
            }

        }



    }else{

        require 'actions/start/new_database.php';

        require 'public/page/site_element/start/new_database.php';
    
    }

}else{

    require 'public/page/site_element/start/database_connection_error.php';

}

include 'public/page/page_element/down_page.php';

?>