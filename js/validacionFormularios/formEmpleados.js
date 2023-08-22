window.addEventListener('load', () => {

    const formEmpl = document.getElementById('form-crarEmpleado');
    var documento = document.getElementById('docEmpleado');
    var nombre = document.getElementById('nomEmpleado');
    var apellido = document.getElementById('apellEmpleado');
    var usuario = document.getElementById('userEmpleado');
    var clave = document.getElementById('claveEmpleado');
    var tipoempl = document.getElementById('tipoEmpl');

    const expresiones = {
        nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
        direccion: /^.{1,50}$/, // 6 a 20 dígitos.
        correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
        telefono: /^\d{7,10}$/, // 7 a 14 numeros.
        clave: /^[a-zA-Z0-9\_\-]{4,10}$/,
        documento: /^[a-zA-Z0-9\_\-]{6,15}$/,
        usuario: /^[a-zA-Z0-9_.+@-]{4,50}$/
    };

    function validarformempl(input) {
        var bandera;
        switch (input) {
            case "docEmpleado":
                var lbdoc = document.getElementById('label_doc_empl');
                var errdoc = document.getElementById('error-doc');
                bandera = validarcampos(expresiones.documento, documento.value, true);
                controlvererror(bandera, errdoc, lbdoc);
                focuserror(bandera, documento);
                console.log("bandera en documento " + bandera);
                break;

            case "nomEmpleado":
                var lbnom = document.getElementById('label_nomEmp');
                var errnom = document.getElementById('error-nombre');
                bandera = validarcampos(expresiones.nombre, nombre.value, true);
                controlvererror(bandera, errnom, lbnom);
                focuserror(bandera, nombre);
                break;

            case "apellEmpleado":
                var lbapell = document.getElementById('label_apell');
                var errapell = document.getElementById('error-ape');
                bandera = validarcampos(expresiones.nombre, apellido.value, true);
                controlvererror(bandera, errapell, lbapell);
                focuserror(bandera, apellido);
                break;

            case "userEmpleado":
                var lbuser = document.getElementById('label_user');
                var erruser = document.getElementById('error-user');
                bandera = validarcampos(expresiones.usuario, usuario.value, true);
                controlvererror(bandera, erruser, lbuser);
                focuserror(bandera, usuario);
                break;

            case "claveEmpleado":
                var lbclave = document.getElementById('label_clave');
                var errclave = document.getElementById('error-clave');
                bandera = validarcampos(expresiones.clave, clave.value, true);
                controlvererror(bandera, errclave, lbclave);
                focuserror(bandera, clave);
                break;

            case "tipoEmpl":
                var lbtipo = document.getElementById('label_tipo');
                var errtipo = document.getElementById('error-tipo');
                bandera = validarcampos(expresiones.nombre, tipoempl.value, true);
                controlvererror(bandera, errtipo, lbtipo);
                focuserror(bandera, tipoempl);
                break;
        }
        console.log("bandera fuera del case " + bandera);
        return bandera;

    }


    formEmpl.addEventListener('submit', (e) => {
        var bandDoc, banNom, banApell, bandUser, bandClave, bandTipo;
        bandTipo = validarformempl(tipoempl.id);
        bandClave = validarformempl(clave.id);
        bandUser = validarformempl(usuario.id);
        banApell = validarformempl(apellido.id);
        banNom = validarformempl(nombre.id);
        bandDoc = validarformempl(documento.id);

        if (!bandDoc || !banNom || !banApell || !bandUser || !tipoempl) {
            e.preventDefault();
            console.log('entra a prevent default');
            console.log('bandoc'.bandDoc);
        }
    });


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
});


