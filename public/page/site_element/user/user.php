<!-- User profile page -->

<?php

require 'actions/user/user_logout.php';

echo "<div class='right-container'>
    <div class='content-large animation-content'>";

echo "<h4>Mon identifiant : ".$_SESSION['identifier']."</h4>";
echo "<hr class='fs-large'>";
echo "<p>Mon nom complet : ".$_SESSION['full_name']."</p>";
echo "<p>Mon adresse email : ".$_SESSION['email']."</p>";
if($_SESSION['type'] == 'admin'){
    echo "<p>Type de compte : Administrateur</p>";
}else{
    echo "<p>Type de compte : Utilisateur</p>";   
}

echo "<hr class='fs-small'>
<br/>";

echo "<form method='post'>
<input type='submit' name='submit_logout' value='Se déconnecter'>
</form>";

echo "</div>
    </div>";