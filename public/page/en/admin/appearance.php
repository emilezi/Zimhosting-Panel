<!-- Appearance settings page -->

<?php

require 'functions/file.php';
require 'actions/admin/appearance/interface_name_edit.php';
require 'actions/admin/appearance/background_edit.php';
require 'actions/admin/appearance/background_reset.php';

echo "<div class='right-container'>
    <div class='content-large'>";

echo "<h2>Background image</h2>
<hr class='fs-large'>";

echo "<p>Change background image</p>";
	
if($Setting->getBackground($db) <> 'ressources/img/background.jpg'){

?>

<div class='center'>
<button onclick="PopUpRadio('submit_background_reset','')">Reset background photo to default</button>
</div>

<?php

}

?>

<div class='center'>
<button onclick="PopUpInterfaceBackgroundEdit()">Change background photo</button>
</div>

<?php

echo "<br/>";

echo "<h2>Interface name</h2>
<hr class='fs-large'>";

echo "<p>Change interface name</p>";

?>

<div class='center'>
<button onclick="PopUpInterfaceNameEdit('<?= $Setting->getInterfaceName($db); ?>')">Change name</button>
</div>

<?php

echo "<script src='functions/popup.js'></script>";

echo "</div>
    </div>";