<!-- Appearance settings page -->

<?php

require 'functions/file.php';
require 'actions/admin/appearance/interface_name_edit.php';
require 'actions/admin/appearance/background_edit.php';
require 'actions/admin/appearance/background_reset.php';

echo "<div class='right-container'>
    <div class='content-large'>";

echo "<h2>Image d'arrière-plan</h2>
<hr class='fs-large'>";

echo "<p>Modifier l'image d'arrière-plan</p>";

echo "<form enctype='multipart/form-data' method='post'>
	<input type='hidden' name='MAX_FILE_SIZE' value='250000' />
	<input type='file' name='background'/>
	<input type='submit' name='submit_background_edit' value='Modifier la photo de fond' />
	<br/><br/>";
	
if($Setting->getBackground($db) <> 'ressources/img/background.jpg'){

echo "<input type='submit' name='submit_background_reset' value='Réinitialiser la photo de fond par défaut' />";

}

echo "</form>";

echo "<br/>";

echo "<h2>Nom de l’interface</h2>
<hr class='fs-large'>";

echo "<p>Modifier le nom de l'interface</p>";

?>

<form method="post">
    <input name="post_interface_name" type="text" placeholder="Saisissez un nom" value="<?= $Setting->getInterfaceName($db); ?>" required/>
	<br/><br/>
	<input type="submit" name="submit_interface_name_edit" value="Modifier le nom" />
</form>

<?php

echo "</div>
    </div>";