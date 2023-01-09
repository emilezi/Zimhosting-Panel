<!-- First user account creation form -->

<div class='container'>
    <div class='form m-center'>

    <h1>Zimhosting panel</h1>

    <hr>

    <h5>Création du compte administrateur</h5>

    <form method='post'>

        <div class='p-vertical'>
        <input name='post_identifier' type='text' placeholder='Saisissez votre identifiant' required/>
        </div>

        <div class='p-vertical'>
        <input name='post_full_name' type='text' placeholder='Saisissez votre nom complet' required/>
        </div>

        <div class='p-vertical'>
        <input name='post_email' type='email' placeholder='Saisissez votre adresse email' required/>
        </div>

        <div class='p-vertical'>
        <input name='post_password' type='password' placeholder='Saisissez votre mot de passe' required/>
        </div>

        <div class='p-vertical'>
        <input name='post_rpassword' type='password' placeholder='Retapez le mot de passe' required/>
        </div>

        <div class='p-vertical'>
        <input type='submit' name='submit_register' value='Valider'>
        </div>

    </form>

    </div>
</div>