<?php
/**
    *
    * user page redirect setting
    *
    */

require 'public/page/site_element/user/aside.php';

if(isset($_GET['action']) && !empty($_GET['action'])){

    if($_GET['action'] == "account_edit"){
                
        require 'public/page/site_element/user/user_edit.php';
                    
    }elseif($_GET['action'] == "account_password_edit"){
                
        require 'public/page/site_element/user/user_password_edit.php';
                    
    }else{
        
        require 'public/page/site_element/user/user.php';
        
    }
    
    }else{
    
        require 'public/page/site_element/user/user.php';
    
}