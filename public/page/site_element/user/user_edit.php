<!-- User edit form -->

<?php
require 'actions/user/user_delete.php';
require 'actions/user/user_edit.php';
?>

<div class='right-container'>
    <div class='content-large'>

<h2>Modifier mon compte</h2>

<hr class='fs-large'>

<br/>

<form method='post'>

    <div class='p-vertical'>
    <input name='post_full_name' type='text' placeholder='Votre nom complet' value='<?php echo $_SESSION['full_name']?>' required/>
    </div>

    <div class='p-vertical'>
    <input type='submit' name='submit_user_edit' value='Valider'>
    </div>

    </form>

<h2>Autre action</h2>

<hr class='fs-large'>

<p>Supprimer mon compte</p>

<form method='post'>

    <input type='radio' name='delete_radio' value='no' checked/>Non
	<input type='radio' name='delete_radio' value='yes' />Oui

    <br/><br/>
    <input type='submit' name='submit_user_delete' value='Supprimer'>

    </form>

    </div>
</div>