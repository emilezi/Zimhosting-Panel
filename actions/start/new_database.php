<?php
/**
    *
    * Creation of the new database
    *
    */

if (isset($_POST['submit_start'])){

    $Database->CreateDatabases();

    header('Location: index.php');

}