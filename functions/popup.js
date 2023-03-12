/*
*
* @author Emile ZIMMER
*
*/

/*
*
* Yes or No Dialog Box
*
*/

function PopUpRadio(action,value) {

    var elem = document.getElementById('popup_form_container');

    elem.innerHTML = "<div class='pop-up-container-form animation-pop-up-form'><div class='pop-up-form'><p>Êtes-vous vraiment sûr de vouloir effectuer l'action demandée ?</p><div class='pop-up-element-form'><form method='post'><input type='submit' name='" + action + value + "' value='Oui'></form><input type='submit' onclick=PopUpClose() value='Non'></div></div></div>";

}

/*
*
* Edit Interface Name Dialog Box
*
*/

function PopUpInterfaceNameEdit(value) {

    var elem = document.getElementById('popup_form_container');

    elem.innerHTML = "<div class='pop-up-container-form animation-pop-up-form'><div class='pop-up-form'><h5>Modification du nom de l'interface</h5><form method='post'><input name='post_interface_name' type='text' placeholder='Saisissez un nom' value='"+value+"' required/><br/><br/><div class='pop-up-element-form'><input type='submit' name='submit_interface_name_edit' value='Modifier le nom'/></form><input type='submit' onclick=PopUpClose() value='Annuler'></div></div></div>";

}

/*
*
* Change Interface Background Image Dialog
*
*/

function PopUpInterfaceBackgroundEdit() {

    var elem = document.getElementById('popup_form_container');

    elem.innerHTML = "<div class='pop-up-container-form animation-pop-up-form'><div class='pop-up-form'><h5>Modification de l'image de fond</h5><form enctype='multipart/form-data' method='post'><input type='hidden' name='MAX_FILE_SIZE' value='250000' /><input type='file' name='background'/><input type='submit' name='submit_background_edit' value='Modifier la photo de fond'/></fom></div></div>";

}

function PopUpClose() {

    var elem = document.getElementById('popup_form_container');

    elem.innerHTML = "";

}