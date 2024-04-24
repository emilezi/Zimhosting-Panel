<!-- User profile page -->

<?php

require 'actions/user/user_logout.php';

echo "<div class='right-container'>
    <div class='content-large animation-content'>";

echo "<h4>My ID : ".$_SESSION['identifier']."</h4>";
echo "<hr class='fs-large'>";
echo "<p>My full name : ".$_SESSION['full_name']."</p>";
echo "<p>My email address : ".$_SESSION['email']."</p>";
if($_SESSION['type'] == 'admin'){
    echo "<p>Account type : Administrator</p>";
}else{
    echo "<p>Account type : User</p>";   
}

echo "<hr class='fs-small'>
<br/>";

echo "<form method='post'>
<input type='submit' name='submit_logout' value='Sign out'>
</form>";

echo "</div>
    </div>";