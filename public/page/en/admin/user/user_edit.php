<!-- User edit form -->

<?php
require 'actions/admin/user/user_edit.php';

$user = $User->getUser($db,$_GET);

if($user == true){
    
    echo "<div class='right-container'>
    <div class='content-large'>";
        
    echo "<h2>Editing the account : ".$user['identifier']."</h2>
        <hr class='fs-large'>
        <br/>";

    echo "<form method='post'>

        <div class='p-vertical'>
        <input name='post_identifier' type='text' placeholder='Enter an identifier' value='".$user['identifier']."' required/>
        </div>

        <div class='p-vertical'>
        <input name='post_full_name' type='text' placeholder='Enter a full name' value='".$user['full_name']."' required/>
        </div>

        <div class='p-vertical'>
        <input name='post_email' type='email' placeholder='Enter an email address' value='".$user['email']."' required/>
        </div>

        <div class='p-vertical'>
        <input type='submit' name='submit_user_edit' value='To validate'>
        </div>

        </form>";

    echo "</div>
    </div>";

}else{

    header('Location: index.php?page=admin');

}