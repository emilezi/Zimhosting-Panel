<!-- Password recovery form -->

<div class='container'>
    <div class='form'>

    <h1><?= $Setting->getInterfaceName($db); ?></h1>

    <hr>

    <h5>Change my password</h5>

    <form method='post'>

        <div class='p-vertical'>
        <input name='post_password' type='password' placeholder='Enter your password' required/>
        </div>

        <div class='p-vertical'>
        <input name='post_rpassword' type='password' placeholder='Reenter your password' required/>
        </div>

        <div class='p-vertical'>
        <input type='submit' name='submit_user_password_recovery' value='To validate'>
        </div>

    </form>

    </div>
</div>