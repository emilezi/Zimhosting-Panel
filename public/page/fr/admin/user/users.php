<!-- New user creation form -->

<?php

require 'actions/admin/user/user_delete.php';

$q = $db->prepare("SELECT * FROM users WHERE 1");
$q->execute();

echo "<div class='right-container'>
    <div class='content-large'>";

echo "<h2>Utilisateurs</h2>
<hr class='fs-large'>
<a href='index.php?page=admin&action=new_user'><p>Nouvel utilisateur</p></a>";

while($users_list = $q->fetch(PDO::FETCH_ASSOC)){

    echo "<h4>".$users_list['identifier']."</h4>";
    echo "<hr class='fs-medium'>";
    echo "<p>Nom complet : ".$users_list['full_name']."</p>";
    echo "<p>Adresse email : ".$users_list['email']."</p>";
    if($users_list['type'] == 'admin'){
    echo "<p>Type : Administrateur</p>";
    }else{
    echo "<p>Type : Utilisateur</p>";   
    }
    if($users_list['active'] == 'yes'){
    echo "<p>Actif : Oui</p>";
    }else{
    echo "<p>Actif : Non</p>";
    }

    echo "<hr class='fs-small'>
    <br/>";

    echo "<form action='index.php?page=admin&action=user_password_edit&id=".$users_list['id_user']."' method='post'>
    <input type='submit' name='submit_user_edit_password_".$users_list['id_user']."' value='Modifier le mot de passe'>
    </form>";

    echo "<form action='index.php?page=admin&action=user_edit&id=".$users_list['id_user']."' method='post'>
    <input type='submit' name='submit_user_edit_".$users_list['id_user']."' value='Modifier le profil'>
    </form>";

    ?>

    <div class='center'>
    <button onclick="PopUpRadio('submit_user_delete_','<?=$users_list['id_user']?>')">Supprimer</button>
    </div>

    <?php

    echo "<script src='functions/popup.js'></script>";

}

echo "</div>
</div>";

?>