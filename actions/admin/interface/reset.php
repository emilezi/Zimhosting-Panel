<?php
/**
    *
    * Setting reset
    *
    */

if(isset($_POST['submit_reset']) && ($User->UserSessionAdmin($db) == 0)){

    $File -> DirectoryReset('apps/');

    $Database -> DeleteDatabases();

    header('Location: index.php');
    
}