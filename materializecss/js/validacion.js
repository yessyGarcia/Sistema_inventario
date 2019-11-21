/* validando los campos SOLO LETRAS Y ESPACIOS*/
function sololetras(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8 || tecla == 32) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-záéíóúÁÉÍÓÚñÑ]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}


/* validando email */
function validaremail(mail)
{
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(mail.value.match(mailformat))
    {
        return true;
    }
    else
    {
        alert("¡El email no es correcto. Escribalo nuevamente!");
        mail.value = "";
        mail.focus();
        return false;
    }
}

/* validando que los emails sean iguales */
function compararemail(mail1, mail2)
{

    if(mail1.value == mail2.value)
    {
        return true;
    }
    else
    {
        alert("¡Los emails deben ser iguales,  Escribalo nuevamente!");
        mail2.value = "";
        mail2.focus();
        return false;
    }
}


/* validando que solo permita LETRAS, NÚMEROS Y ESPACIOS*/
function letrasynumeros(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8 || tecla == 32) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-záéíóúÁÉÍÓÚñÑ0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}


/* validando que LA CLAVE solo permita LETRAS Y NÚMEROS*/

function letrasynumerosClave(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-záéíóúÁÉÍÓÚñÑ0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

/*
function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}*/


/* validando que las claves sean iguales */
function compararclave(clave1, clave2)
{

    if(clave1.value == clave2.value)
    {
        return true;
    }
    else
    {
        alert("¡Las claves deben ser iguales,  Escribalas nuevamente!");
        clave1.value = "";
        clave1.focus();
        clave2.value = "";
        
       
        return false;
    }
}




// Función que solo acepta numeros 
function solonumeros(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada solo acepta numeros
    patron = /[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}


// Función que solo acepta numeros y puntos
function numerosypuntos(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar y tecla para punto, siempre las permite
    if (tecla == 8 || tecla == 46) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y puntos
    patron = /[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}


function letrasynumerosG(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8 || tecla == 45) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-zñÑ0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
