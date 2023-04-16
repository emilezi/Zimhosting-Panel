<!-- Account recovery form -->

<div class='container'>
    <div class='form'>

    <h1><?= $Setting->getInterfaceName($db); ?></h1>

    <hr>

    <h5>Récupération du compte</h5>

    <form method='post'>

        <div class='p-vertical'>
        <input name='post_email' type='email' placeholder='Saisissez votre adresse email' required/>
        </div>

        <div class='p-vertical'>
        <input type='submit' name='submit_recovery' value='Valider'>
        </div>

    </form>

    </div>
</div>