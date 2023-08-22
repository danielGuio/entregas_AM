window.addEventListener('load', () => {

    const formulario = document.getElementById('form-crear-cliRem');
    var documento = document.getElementById('docclirem');
    var tipodoc = document.getElementById('tipodocclirem');
    var digitVer = document.getElementById('digitverclirem');
    var nombre = document.getElementById('nombreclirem');
    var apellido = document.getElementById('apellidoclirem');
    var razon = document.getElementById('razonclirem');
    var direccion = document.getElementById('direccionclirem');
    var telefono = document.getElementById('telefonoclirem');
    var email = document.getElementById('emailclirem');
    var contacto = document.getElementById('contactoclirem');
    var ubicasion = document.getElementById('ubicasionclirem');


    const expresiones = {
        nombre: /^[a-zA-ZÀ-ÿ\s]{1,50}$/, // Letras y espacios, pueden llevar acentos.
        direccion: /^.{1,50}$/, // 6 a 20 dígitos.
        correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
        telefono: /^\d{7,10}$/, // 7 a 14 numeros.
        documento: /^[a-zA-Z0-9\_\-]{6,15}$/
    };

    function validarform(input) {
        var bandera;
        switch (input) {

            case "docclirem":
                var lbdoc = document.getElementById('label_doccli');
                var errpdoc = document.getElementById('error-doc');
                bandera = validarcampos(expresiones.documento, documento.value, true);
                controlvererror(bandera, errpdoc, lbdoc);
                focuserror(bandera, documento);
                break;

            case "tipodocclirem":
                var lbtipodoc = document.getElementById('lbtipodoc');
                var errntipodoc = document.getElementById('error-tipodoc');
                bandera = validarcampos(expresiones.nombre, tipodoc.value, true);
                if (tipodoc.value !== "NIT" || tipodoc.value !== "Cedula") {
                } else {
                    bandera = true;
                }
                controlvererror(bandera, errntipodoc, lbtipodoc);
                focuserror(bandera, tipodoc);
                break;

            case "nombreclirem":
                var lbnombre = document.getElementById('lbnombre');
                var errnombreclirem = document.getElementById('error-nombre');
                bandera = validarcampos(expresiones.nombre, nombre.value, true);
                controlvererror(bandera, errnombreclirem, lbnombre);
                focuserror(bandera, nombre);
                break;

            case "direccionclirem":
                var lbdireccion = document.getElementById('lbdireccion');
                var errdireccion = document.getElementById('error-direccion');
                bandera = validarcampos(expresiones.direccion, direccion.value, true);
                controlvererror(bandera, errdireccion, lbdireccion);
                focuserror(bandera, direccion);
                break;

            case "telefonoclirem":
                var lbtelefono = document.getElementById('lbtelefono');
                var errtelefono = document.getElementById('error-telefono');
                bandera = validarcampos(expresiones.telefono, telefono.value, true);
                controlvererror(bandera, errtelefono, lbtelefono);
                focuserror(bandera, telefono);
                break;

            case "emailclirem":
                var lbemail = document.getElementById('lbemail');
                var erremail = document.getElementById('error-email');
                bandera = validarcampos(expresiones.correo, email.value, false);
                controlvererror(bandera, erremail, lbemail);
                focuserror(bandera, email);
                break;

            case "contactoclirem":
                var lbcontac = document.getElementById('lbcontac');
                var errpcontac = document.getElementById('error-contac');
                bandera = validarcampos(expresiones.nombre, contacto.value, false);
                controlvererror(bandera, errpcontac, lbcontac);
                focuserror(bandera, contacto);
                break;

            case "ubicasionclirem":
                var lbubicasion = document.getElementById('lbubicasion');
                var errpubic = document.getElementById('error-ubic');
                bandera = validarcampos(expresiones.nombre, ubicasion.value, true);
                controlvererror(bandera, errpubic, lbubicasion);
                focuserror(bandera, ubicasion);
                break;
        }
        return bandera;
    }


    function validarcampos(expresion, campotest, requerido) {
        var bandera = false;
        if (requerido) {
            if (expresion.test(campotest)) {
                bandera = true;
            }
        } else {
            if (campotest === "") {
                bandera = true;
            } else {
                if (expresion.test(campotest)) {
                    bandera = true;
                }
            }
        }
        return bandera;
    }

    function controlvererror(bandera, atrp, atrlb) {
        if (bandera === true) {
            atrp.setAttribute('style', 'display: none');
            atrlb.setAttribute('style', 'color: black');
        } else {
            atrp.setAttribute('style', 'display: block');
            atrlb.setAttribute('style', 'color: red');
        }
    }

    function focuserror(bandera, input) {
        if (!bandera) {
            input.focus();
        }
    }

    formulario.addEventListener('submit', (e) => {
        var banddoc, bandtipodoc, bandnom, bandDir, bandtel, bandcontac, bandemail, bandubic;

        bandubic = validarform(ubicasion.id);
        bandemail = validarform(email.id);
        bandcontac = validarform(contacto.id);
        bandtel = validarform(telefono.id);
        bandDir = validarform(direccion.id);
        bandnom = validarform(nombre.id);
        bandtipodoc = validarform(tipodoc.id);
        banddoc = validarform(documento.id);

        if (!banddoc || !bandtipodoc || !bandnom || !bandDir || !bandtel || !bandcontac || !bandemail || !bandubic) {
            e.preventDefault();
        }
    });

    //el siguiente metodo se us para habilitar o deshabilitar los campos nombre, apellido o razon social de acuerdo a la seleccion del documento
    tipodoc.addEventListener('click', () => {
        if (tipodoc.value === "Cedula") {
            nombre.disabled = false;
            nombre.classList.remove("formulario-input-deshabilitado");
            document.getElementById('lbnombre').classList.remove("label-deshabilitado");

            apellido.disabled = false;
            apellido.classList.remove("formulario-input-deshabilitado");
            document.getElementById('lbapellido').classList.remove("label-deshabilitado");
            
            razon.disabled = true;
            razon.classList.add("formulario-input-deshabilitado");
            document.getElementById('lbrazon').classList.add("label-deshabilitado");
            
            digitVer.disabled = true;
            digitVer.classList.add("formulario-input-deshabilitado");
            document.getElementById('label_digVercli').classList.add("label-deshabilitado");

        } else if (tipodoc.value === "NIT") {
            razon.disabled = false;
            razon.classList.remove("formulario-input-deshabilitado");
            document.getElementById('lbrazon').classList.remove("label-deshabilitado");
            
            digitVer.disabled = false;
            digitVer.classList.remove("formulario-input-deshabilitado");
            document.getElementById('label_digVercli').classList.remove("label-deshabilitado");
            
            nombre.disabled = true;
            nombre.classList.add("formulario-input-deshabilitado");
            document.getElementById('lbnombre').classList.add("label-deshabilitado");

            apellido.disabled = true;
            apellido.classList.add("formulario-input-deshabilitado");
            document.getElementById('lbapellido').classList.add("label-deshabilitado");
        }else{
            
            razon.disabled = true;
            razon.classList.add("formulario-input-deshabilitado");
            document.getElementById('lbrazon').classList.add("label-deshabilitado");
            
            digitVer.disabled = true;
            digitVer.classList.add("formulario-input-deshabilitado");
            document.getElementById('label_digVercli').classList.add("label-deshabilitado");
            
            nombre.disabled = true;
            nombre.classList.add("formulario-input-deshabilitado");
            document.getElementById('lbnombre').classList.add("label-deshabilitado");

            apellido.disabled = true;
            apellido.classList.add("formulario-input-deshabilitado");
            document.getElementById('lbapellido').classList.add("label-deshabilitado");
        }

    });

});



