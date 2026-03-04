/*
*
* @author Emile Z.
*
*/

/*
*
* Constant parameter language
*
*/

const language = (navigator.language || navigator.userLanguage).substr(0, 2);

/*
*
* Yes or No Dialog Box
*
*/

function PopUpRadio(action,value) {

    var elem = document.getElementById('popup_form_container');
    
    if(language === 'fr'){

        elem.innerHTML = "<div class='pop-up-container-form animation-pop-up-form'><div class='pop-up-form'><p>Êtes-vous vraiment sûr de vouloir effectuer l'action demandée ?</p><div class='pop-up-element-form'><form method='post'><input type='submit' name='" + action + value + "' value='Oui'></form><input type='submit' onclick=PopUpClose() value='Non'></div></div></div>";

    }else{

        elem.innerHTML = "<div class='pop-up-container-form animation-pop-up-form'><div class='pop-up-form'><p>Are you sure you want to perform the requested action ?</p><div class='pop-up-element-form'><form method='post'><input type='submit' name='" + action + value + "' value='Yes'></form><input type='submit' onclick=PopUpClose() value='No'></div></div></div>";
        
    }

}

/*
*
* Edit Interface Name Dialog Box
*
*/

function PopUpInterfaceNameEdit(value) {

    var elem = document.getElementById('popup_form_container');
    
    if(language === 'fr'){

        elem.innerHTML = "<div class='pop-up-container-form animation-pop-up-form'><div class='pop-up-form'><h5>Modification du nom de l'interface</h5><form method='post'><input name='post_interface_name' type='text' placeholder='Saisissez un nom' value='"+value+"' required/><br/><br/><input type='submit' name='submit_interface_name_edit' value='Modifier le nom'/></form></div></div>";

    }else{

        elem.innerHTML = "<div class='pop-up-container-form animation-pop-up-form'><div class='pop-up-form'><h5>Changing the interface name</h5><form method='post'><input name='post_interface_name' type='text' placeholder='Enter a name' value='"+value+"' required/><br/><br/><input type='submit' name='submit_interface_name_edit' value='Change name'/></form></div></div>";
        
    }

}

/*
*
* Change Interface Background Image Dialog
*
*/

function PopUpInterfaceBackgroundEdit() {

    var elem = document.getElementById('popup_form_container');

    if(language === 'fr'){

        elem.innerHTML = "<div class='pop-up-container-form animation-pop-up-form'><div class='pop-up-form'><h5>Modification de l'image de fond</h5><form enctype='multipart/form-data' method='post'><input type='hidden' name='MAX_FILE_SIZE' value='2500000' /><input type='file' name='background'/><input type='submit' name='submit_background_edit' value='Modifier la photo de fond'/></fom></div></div>";

    }else{

        elem.innerHTML = "<div class='pop-up-container-form animation-pop-up-form'><div class='pop-up-form'><h5>Changing the background image</h5><form enctype='multipart/form-data' method='post'><input type='hidden' name='MAX_FILE_SIZE' value='2500000' /><input type='file' name='background'/><input type='submit' name='submit_background_edit' value='Change background photo'/></fom></div></div>";
        
    }

}

function PopUpClose() {

    var elem = document.getElementById('popup_form_container');

    elem.innerHTML = "";

}