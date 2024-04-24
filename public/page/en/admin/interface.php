<!-- Interface settings page -->

<?php

require 'functions/file.php';
require 'actions/admin/interface/display_edit.php';
require 'actions/admin/interface/reset.php';

echo "<div class='right-container'>
    <div class='content-large'>";

echo "<h2>Reset</h2>
	<hr class='fs-large'>";

echo "<p>Reset interface settings</p>";

?>

<div class=center>
	<button onclick="PopUpRadio('submit_reset','')">Reset the app</button>
</div>

<?php

echo "<script src='functions/popup.js'></script>";

echo "<h2>Display</h2>
	<hr class='fs-large'>";

echo "<p>This setting allows you to modify user accessibility regarding the application panel. In public view, users will only authenticate to necessary applications.</p>";

if($Setting->getDisplay($db) == 'public'){

	echo "<p>The application panel is visible to everyone</p>";

	echo "<form method='post'>
	<input type='radio' name='display_radio' value='default' />By default
	<input type='radio' name='display_radio' value='public' checked/>Public
	<br/><br/>
	<input type='submit' name='submit_display_edit' value='To modify'>
	</form>";

}else{

	echo "<p>The application panel is only visible to authenticated users</p>";

	echo "<form method='post'>
	<input type='radio' name='display_radio' value='default' checked/>By default
	<input type='radio' name='display_radio' value='public' />Public
	<br/><br/>
	<input type='submit' name='submit_display_edit' value='To modify'>
	</form>";

}

echo "</div>
    </div>";