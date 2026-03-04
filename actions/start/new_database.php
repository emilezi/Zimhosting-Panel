<?php
/**
    *
    * Creation of the new database
    *
    */

if(isset($_POST['submit_start'])){

    $Database->newDatabase();

    header('Location: index.php');

}