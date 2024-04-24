<!-- User edit form -->

<?php
require 'actions/user/user_delete.php';
require 'actions/user/user_edit.php';
?>

<div class='right-container'>
    <div class='content-large'>

<h2>Edit my account</h2>

<hr class='fs-large'>

<br/>

<form method='post'>

    <div class='p-vertical'>
    <input name='post_full_name' type='text' placeholder='Your full name' value='<?php echo $_SESSION['full_name']?>' required/>
    </div>

    <div class='p-vertical'>
    <input type='submit' name='submit_user_edit' value='To validate'>
    </div>

    </form>

<h2>Other action</h2>

<hr class='fs-large'>

<p>Delete my account</p>

<form method='post'>

    <input type='radio' name='delete_radio' value='no' checked/>No
	<input type='radio' name='delete_radio' value='yes' />Yes

    <br/><br/>
    <input type='submit' name='submit_user_delete' value='Delete'>

    </form>

    </div>
</div>