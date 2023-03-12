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
	
if($Setting->getBackground($db) <> 'ressources/img/background.jpg'){

?>

<div class='center'>
<button onclick="PopUpRadio('submit_background_reset','')">Réinitialiser la photo de fond par défaut</button>
</div>

<?php

}

?>

<div class='center'>
<button onclick="PopUpInterfaceBackgroundEdit()">Modifier la photo de fond</button>
</div>

<?php

echo "<br/>";

echo "<h2>Nom de l’interface</h2>
<hr class='fs-large'>";

echo "<p>Modifier le nom de l'interface</p>";

?>

<div class='center'>
<button onclick="PopUpInterfaceNameEdit('<?= $Setting->getInterfaceName($db); ?>')">Modifier le nom</button>
</div>

<?php

echo "<script src='functions/popup.js'></script>";

echo "</div>
    </div>";