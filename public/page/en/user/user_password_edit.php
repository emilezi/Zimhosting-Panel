<!-- User password change form -->

<?php
require 'actions/user/user_password_edit.php';
?>

<div class='right-container'>
    <div class='content-large'>

<h2>Change my password</h2>

<hr class='fs-large'>

<br/>

<form method='post'>

    <div class='p-vertical'>
    <input name='post_password' type='password' placeholder='Enter your password' required/>
    </div>

    <div class='p-vertical'>
    <input name='post_rpassword' type='password' placeholder='Reenter your password' required/>
    </div>

    <div class='p-vertical'>
    <input type='submit' name='submit_user_password_edit' value='To validate'>
    </div>

    </form>

    </div>
</div>