<!-- User password change form -->

<?php
require 'actions/admin/user/user_password_edit.php';

$user = $User->getUser($db,$_GET);

if($user == true){

    echo "<div class='right-container'>
    <div class='content-large'>";
        
    echo "<h2>Changing the account password : ".$user['identifier']."</h2>
        <hr class='fs-large'>
        <br/>";

    echo "<form method='post'>

        <div class='p-vertical'>
        <input name='post_password' type='password' placeholder='Enter a new password' required/>
        </div>

        <div class='p-vertical'>
        <input name='post_rpassword' type='password' placeholder='Retype password' required/>
        </div>

        <div class='p-vertical'>
        <input type='submit' name='submit_user_password_edit' value='To validate'>
        </div>

        </form>";

    echo "</div>
    </div>";
    
}else{

    header('Location: index.php?page=admin');

}
?>