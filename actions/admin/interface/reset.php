<?php
/**
    *
    * Setting reset
    *
    */

if(isset($_POST['submit_reset']) && ($User->UserSessionAdmin() == 0)){

    $File -> DirectoryReset('apps/');

    $Database -> deleteDatabase();

    header('Location: index.php');
    
}