<!-- Interface settings page -->

<?php

require 'actions/admin/interface/display_edit.php';

echo "<div class='right-container'>
    <div class='content-large'>";

echo "<h2>Affichage</h2>
<hr class='fs-large'>";

echo "<p>Ce paramètre permet de modifier l'accessibilité des utilisateurs concernant le panneau de l'application. En visibilité publique, les utilisateurs s'authentifieront uniquement sur les applications nécessaires.</p>";

if($Setting->getDisplay($db) == 'public'){

	echo "<p>Le panneau d'application est visible pour tout le monde</p>";

	echo "<form method='post'>
	<input type='radio' name='display_radio' value='default' />Par defaut
	<input type='radio' name='display_radio' value='public' checked/>Publique
	<br/><br/>
	<input type='submit' name='submit_display_edit' value='Modifier'>
	</form>";

}else{

	echo "<p>Le panneau d'application n'est visible que pour les utilisateurs authentifiés</p>";

	echo "<form method='post'>
	<input type='radio' name='display_radio' value='default' checked/>Par defaut
	<input type='radio' name='display_radio' value='public' />Publique
	<br/><br/>
	<input type='submit' name='submit_display_edit' value='Modifier'>
	</form>";

}

echo "</div>
    </div>";