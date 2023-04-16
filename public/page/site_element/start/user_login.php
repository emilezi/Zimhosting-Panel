<!-- Authentication form -->

<div class='container'>
    <div class='form'>

    <h1><?= $Setting->getInterfaceName($db); ?></h1>

    <hr>

    <h5>Authentification</h5>

    <form method='post'>

        <div class='p-vertical'>
        <input name='post_identifier' type='text' placeholder='Saisissez votre identifiant' required/>
        </div>

        <div class='p-vertical'>
        <input name='post_password' type='password' placeholder='Saisissez votre mot de passe' required/>
        </div>

        <div class='p-vertical'>
        <input type='submit' name='submit_login' value='Connexion'>
        </div>

    </form>

    <p><a href='index.php?page=user_recovery'>Mot de passe oublié ?</a></p>

    </div>
</div>