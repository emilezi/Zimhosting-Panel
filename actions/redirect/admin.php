<?php
/**
    *
    * admin page redirect setting
    *
    */

require 'public/page/site_element/admin/aside.php';

if(isset($_GET['action']) && !empty($_GET['action'])){

    if($_GET['action'] == "apps"){
            
        require 'public/page/site_element/admin/apps.php';
            
    }elseif($_GET['action'] == "store"){
            
        require 'public/page/site_element/admin/store.php';
                
    }elseif($_GET['action'] == "users"){
            
        require 'public/page/site_element/admin/user/users.php';
                
    }elseif($_GET['action'] == "new_user"){

        require 'actions/admin/user/user_register.php';
            
        require 'public/page/site_element/admin/user/user_register.php';
                
    }elseif(($_GET['action'] == "user_edit") && (isset($_GET['id'])) && (!empty($_GET['id']))){
            
        require 'public/page/site_element/admin/user/user_edit.php';
            
    }elseif(($_GET['action'] == "user_password_edit") && (isset($_GET['id'])) && (!empty($_GET['id']))){
            
        require 'public/page/site_element/admin/user/user_password_edit.php';
            
    }elseif($_GET['action'] == "statistics"){
            
        require 'public/page/site_element/admin/statistics.php';
            
    }elseif($_GET['action'] == "interface"){
            
        require 'public/page/site_element/admin/interface.php';
            
    }else{
            
        require 'public/page/site_element/admin/about.php';
            
    }

    }else{

    require 'public/page/site_element/admin/about.php';

}