<!-- Authentication form -->

<div class='container'>
    <div class='form'>

    <h1><?= $Setting->getInterfaceName($db); ?></h1>

    <hr>

    <h5>Authentication</h5>

    <form method='post'>

        <div class='p-vertical'>
        <input name='post_identifier' type='text' placeholder='Enter your username' required/>
        </div>

        <div class='p-vertical'>
        <input name='post_password' type='password' placeholder='Enter your password' required/>
        </div>

        <div class='p-vertical'>
        <input type='submit' name='submit_login' value='Connection'>
        </div>

    </form>

    <p><a href='index.php?page=user_recovery'>Forgot your password ?</a></p>

    </div>
</div>