<!-- User password change form -->

<?php
require 'actions/admin/user/user_password_edit.php';

$user = $User->getUser($db,$_GET);

if($user == true){

    echo "<div class='right-container'>
    <div class='content-large'>";
        
    echo "<h2>Modification du mot de passe du compte : ".$user['identifier']."</h2>
        <hr class='fs-large'>
        <br/>";

    echo "<form method='post'>

        <div class='p-vertical'>
        <input name='post_password' type='password' placeholder='Saisissez un nouveau mot de passe' required/>
        </div>

        <div class='p-vertical'>
        <input name='post_rpassword' type='password' placeholder='Retapez le mot de passe' required/>
        </div>

        <div class='p-vertical'>
        <input type='submit' name='submit_user_password_edit' value='Valider'>
        </div>

        </form>";

    echo "</div>
    </div>";
    
}else{

    header('Location: index.php?page=admin');

}
?>