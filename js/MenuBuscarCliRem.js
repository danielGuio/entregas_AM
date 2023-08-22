window.addEventListener('load', () => {
    var radiobtndoc = document.getElementById("RadioBuscCliRemDoc");
    var radiobtnnom = document.getElementById("RadioBuscCliRemNom");
    var radiobtbuscTodos = document.getElementById("RadioBuscCliRemTodos");
    var fielsetnom = document.getElementById('fielset-nom');
    var fielsetdocu = document.getElementById('fielset-docu');
    var btnbuscar = document.getElementById('BuscarCliRem');
    var formBucCliRem = document.getElementById('formCliRemBusc');
    var inputdoc = document.getElementById('docClirem');
    var inputnom = document.getElementById('nomclirem');
    let formulario = new FormData(formBucCliRem);
    var mensjErrorvacio = document.getElementById('mens-error-campvacio');


    // captura de datos del formulario editar 
    var formBucCliRemedit = document.getElementById('form-crear-cliRem');
    var documentoclirem = document.getElementById('docclirem');
    var tipoclirem = document.getElementById('tipodocclirem');
    var nomclirem = document.getElementById('nombreclirem');
    var direclirem = document.getElementById('direccionclirem');
    var teleclirem = document.getElementById('telefonoclirem');
    var emaiclirem = document.getElementById('emailclirem');
    var contclirem = document.getElementById('contactoclirem');
    var ubicclirem = document.getElementById('ubicasionclirem');


    const expresiones = {
        nombre: /^[a-zA-ZÀ-ÿ\s]{1,50}$/, // Letras y espacios, pueden llevar acentos.
        direccion: /^.{1,50}$/, // 6 a 20 dígitos.
        correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
        telefono: /^\d{7,10}$/, // 7 a 14 numeros.
        documento: /^[a-zA-Z0-9\_\-]{6,15}$/
    };

    var documInicialEdit = "";

//------ en estos dos eventos se captura el clic en los radio btn para controlar las acciones de aparecer los campos del formulario
    radiobtndoc.addEventListener('click', () => {
        var radiobtndocCehc = document.getElementById("RadioBuscCliRemDoc").checked;
        if (radiobtndocCehc) {
            fielsetdocu.setAttribute("style", "display: block");
            fielsetnom.setAttribute("style", "display: none");
            inputnom.value = "";
            btnbuscar.setAttribute("style", "display: block");
        } else {
            fielsetdocu.setAttribute("style", "display: none");
        }
        mensjErrorvacio.setAttribute("style", "display: none");
    });

    radiobtnnom.addEventListener('click', () => {
        var radiobtnnomCehc = document.getElementById("RadioBuscCliRemNom").checked;
        if (radiobtnnomCehc) {
            fielsetnom.setAttribute("style", "display: block");
            fielsetdocu.setAttribute("style", "display: none");
            inputdoc.value = "";
        } else {
            fielsetnom.setAttribute("style", "display: none");
        }
        mensjErrorvacio.setAttribute("style", "display: none");
    });

    radiobtbuscTodos.addEventListener('click', () => {
        var radiobtnTodosCehc = document.getElementById("RadioBuscCliRemTodos").checked;
        if (radiobtnTodosCehc) {
            fielsetnom.setAttribute("style", "display: none");
            fielsetdocu.setAttribute("style", "display: none");
            inputdoc.value = "";
            inputnom.value = "";
            btnbuscar.setAttribute("style", "display: block");
        } else {
        }
        mensjErrorvacio.setAttribute("style", "display: none");
    });
//------ fin de acciones de radio buton----------------------------------------------------------------------------------------


//-----evento submit del formulario de buscar
    formBucCliRem.addEventListener('submit', (e) => {
        e.preventDefault();
        var radiobtndocCehc = document.getElementById("RadioBuscCliRemDoc").checked;
        var radiobtnnomCehc = document.getElementById("RadioBuscCliRemNom").checked;
        var radiobtnTodosCehc = document.getElementById("RadioBuscCliRemTodos").checked;
        if (radiobtndocCehc && inputdoc.value === "") {
            mensjErrorvacio.setAttribute("style", "display: block");
        } else if (radiobtnnomCehc && inputnom.value === "") {
            mensjErrorvacio.setAttribute("style", "display: block");
        } else if (radiobtnTodosCehc) {
            mensjErrorvacio.setAttribute("style", "display: none");
            data();
        } else if (radiobtndocCehc && inputdoc.value !== "" || radiobtnnomCehc && inputnom.value !== "") {
            data();
        }
    });


    formBucCliRemedit.addEventListener('submit', (e) => {

        var banddoc, bandtipodoc, bandnom, bandDir, bandtel, bandcontac, bandemail, bandubic;
        bandubic = validarform(ubicclirem.id);
        bandemail = validarform(emaiclirem.id);
        bandcontac = validarform(contclirem.id);
        bandtel = validarform(teleclirem.id);
        bandDir = validarform(direclirem.id);
        bandnom = validarform(nomclirem.id);
        bandtipodoc = validarform(tipoclirem.id);
        banddoc = validarform(documentoclirem.id);

        if (!banddoc || !bandtipodoc || !bandnom || !bandDir || !bandtel || !bandcontac || !bandemail || !bandubic) {
            e.preventDefault();
        } else {
            dataedit(documInicialEdit);
            e.preventDefault();
        }

    });

//----------------------------------------


    function data() {
        let formulario = new FormData(formBucCliRem);
        formulario.append('btnbuscar', true);//aqui se agrega una variable al formulario que se va en body para validar en php

        fetch('/entregas-am/controlador/ClienteRemController.php', {
            method: 'POST',
            body: formulario
        })
                .then(respuesta => respuesta.json())
                .then(data => {
                    var tablaclirem = document.getElementById('tablaclientesrem');
                    var contTabla = document.getElementById('container-table-clirembusc');
                    var menserror = document.getElementById('mens-error-conslt');
                    if (data === "sinClienterembd") {
                        contTabla.setAttribute('style', 'display: none');
                        menserror.setAttribute('style', 'display: block');
                        eliminarfilas(tablaclirem);
                    } else if (radiobtndoc.checked) {
                        contTabla.setAttribute('style', 'display: block');
                        menserror.setAttribute('style', 'display: none');
                        eliminarfilas(tablaclirem);
                        var cuerpotabla = document.createElement('tbody');
                        const buttonModiCliRem = document.createElement('button');
                        buttonModiCliRem.type = 'button';
                        buttonModiCliRem.innerText = "Editar";
                        buttonModiCliRem.id = "btn-modificarCliRem";
                        buttonModiCliRem.className = "btnEditCliRem";

                        let fila = document.createElement('tr');

                        let td = document.createElement('td');
                        td.innerText = data[0];
                        fila.appendChild(td);

                        td = document.createElement('td');
                        td.innerText = data[1];
                        fila.appendChild(td);

                        td = document.createElement('td');
                        td.innerText = data[2];
                        fila.appendChild(td);

                        td = document.createElement('td');
                        td.innerText = data[3];
                        fila.appendChild(td);

                        td = document.createElement('td');
                        td.innerText = data[4];
                        fila.appendChild(td);

                        td = document.createElement('td');
                        td.innerText = data[5];
                        fila.appendChild(td);

                        td = document.createElement('td');
                        td.innerText = data[6];
                        fila.appendChild(td);

                        td = document.createElement('td');
                        td.innerText = data[7];
                        fila.appendChild(td);

                        td = document.createElement('td');
                        td.appendChild(buttonModiCliRem);
                        buttonModiCliRem.value = data[0];
                        fila.appendChild(td);

                        buttonModiCliRem.addEventListener('click', (e) => {
                            documInicialEdit = controlmodificar(data);
                        });

                        cuerpotabla.appendChild(fila);
                        tablaclirem.appendChild(cuerpotabla);


                    } else if (radiobtnnom.checked || radiobtbuscTodos.checked) {
                        contTabla.setAttribute('style', 'display: block');
                        menserror.setAttribute('style', 'display: none');
                        var tablaclirem2 = document.getElementById('tablaclientesrem');
                        eliminarfilas(tablaclirem2);
                        var cuerpotabla2 = document.createElement('tbody');
                        for (var i = 0; i < data.length; i++) {
                            const buttonModiCliRem = document.createElement('button');
                            buttonModiCliRem.type = 'button';
                            buttonModiCliRem.innerText = "Modificar";
                            buttonModiCliRem.className = "btnEditCliRem";

                            let fila = document.createElement('tr');

                            let td = document.createElement('td');
                            td.innerText = data[i][0];
                            fila.appendChild(td);

                            td = document.createElement('td');
                            td.innerText = data[i][1];
                            fila.appendChild(td);

                            td = document.createElement('td');
                            td.innerText = data[i][2];
                            fila.appendChild(td);

                            td = document.createElement('td');
                            td.innerText = data[i][3];
                            fila.appendChild(td);

                            td = document.createElement('td');
                            td.innerText = data[i][4];
                            fila.appendChild(td);

                            td = document.createElement('td');
                            td.innerText = data[i][5];
                            fila.appendChild(td);

                            td = document.createElement('td');
                            td.innerText = data[i][6];
                            fila.appendChild(td);

                            td = document.createElement('td');
                            td.innerText = data[i][7];
                            fila.appendChild(td);

                            td = document.createElement('td');
                            td.appendChild(buttonModiCliRem);
                            buttonModiCliRem.value = data[i][0];
                            fila.appendChild(td);

                            buttonModiCliRem.addEventListener('click', (e) => {
                                var arraydatosclifila = recorrerdatamatriz(buttonModiCliRem.value, data);
                                documInicialEdit = controlmodificar(arraydatosclifila);
                            });

                            cuerpotabla2.appendChild(fila);
                            tablaclirem2.appendChild(cuerpotabla2);
                        }
                    }
                });
    }

    function eliminarfilas(tabla) {
        var rowCount = tabla.rows.length;
        while (tabla.rows.length > 1) {
            tabla.deleteRow(1);
        }
    }

    function recorrerdatamatriz(docclienterem, data) {
        var pociarray;
        for (i = 0; i < data.length; i++) {
            if (data[i][0] === docclienterem) {
                pociarray = data[i];
                break;
            } else {
                pociarray = false;
            }
        }
        return pociarray;
    }

    function controlmodificar(arraydatosclifila) {
        documentoclirem.value = arraydatosclifila[0];
        tipoclirem.value = arraydatosclifila[1];
        nomclirem.value = arraydatosclifila[2];
        direclirem.value = arraydatosclifila[3];
        teleclirem.value = arraydatosclifila[4];
        emaiclirem.value = arraydatosclifila[5];
        contclirem.value = arraydatosclifila[6];
        ubicclirem.value = arraydatosclifila[7];
        var contformedit = document.getElementById('form-edit-cli');
        contformedit.setAttribute('style', 'display: block');
        return arraydatosclifila[0];
    }



//--------------------lineas de validacion

    function validarform(input) {
        var bandera;
        switch (input) {

            case "docclirem":
                var lbdoc = document.getElementById('label_doccli');
                var errpdoc = document.getElementById('error-doc');
                bandera = validarcampos(expresiones.documento, documentoclirem.value, true);
                controlvererror(bandera, errpdoc, lbdoc);
                focuserror(bandera, documentoclirem);
                break;

            case "tipodocclirem":
                var lbtipodoc = document.getElementById('lbtipodoc');
                var errntipodoc = document.getElementById('error-tipodoc');
                bandera = validarcampos(expresiones.nombre, tipoclirem.value, true);
                if (tipoclirem.value !== "NIT" || tipoclirem.value !== "Cedula") {
                } else {
                    bandera = true;
                }
                controlvererror(bandera, errntipodoc, lbtipodoc);
                focuserror(bandera, tipoclirem);
                break;

            case "nombreclirem":
                var lbnombre = document.getElementById('lbnombre');
                var errnombreclirem = document.getElementById('error-nombre');
                bandera = validarcampos(expresiones.nombre, nomclirem.value, true);
                controlvererror(bandera, errnombreclirem, lbnombre);
                focuserror(bandera, nomclirem);
                break;

            case "direccionclirem":
                var lbdireccion = document.getElementById('lbdireccion');
                var errdireccion = document.getElementById('error-direccion');
                bandera = validarcampos(expresiones.direccion, direclirem.value, true);
                controlvererror(bandera, errdireccion, lbdireccion);
                focuserror(bandera, direclirem);
                break;

            case "telefonoclirem":
                var lbtelefono = document.getElementById('lbtelefono');
                var errtelefono = document.getElementById('error-telefono');
                bandera = validarcampos(expresiones.telefono, teleclirem.value, true);
                controlvererror(bandera, errtelefono, lbtelefono);
                focuserror(bandera, teleclirem);
                break;

            case "emailclirem":
                var lbemail = document.getElementById('lbemail');
                var erremail = document.getElementById('error-email');
                bandera = validarcampos(expresiones.correo, emaiclirem.value, false);
                controlvererror(bandera, erremail, lbemail);
                focuserror(bandera, emaiclirem);
                break;

            case "contactoclirem":
                var lbcontac = document.getElementById('lbcontac');
                var errpcontac = document.getElementById('error-contac');
                bandera = validarcampos(expresiones.nombre, contclirem.value, false);
                controlvererror(bandera, errpcontac, lbcontac);
                focuserror(bandera, contclirem);
                break;

            case "ubicasionclirem":
                var lbubicasion = document.getElementById('lbubicasion');
                var errpubic = document.getElementById('error-ubic');
                bandera = validarcampos(expresiones.nombre, ubicclirem.value, true);
                controlvererror(bandera, errpubic, lbubicasion);
                focuserror(bandera, ubicclirem);
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


//---------------lineas de validacion

    function dataedit(documInicialEdit) {
        let formularioedit = new FormData(formBucCliRemedit);
        formulario.append('btnbuscar', false);
        formularioedit.append('btneditar', true);
        formularioedit.append('documento', documentoclirem.value);
        formularioedit.append('tipoDoc', tipoclirem.value);
        formularioedit.append('nombre', nomclirem.value);
        formularioedit.append('direccion', direclirem.value);
        formularioedit.append('telefono', teleclirem.value);
        formularioedit.append('email', emaiclirem.value);
        formularioedit.append('contacto', contclirem.value);
        formularioedit.append('ubicasion', ubicclirem.value);
        formularioedit.append('documentoinicial', documInicialEdit);


        fetch('/entregas-am/controlador/ClienteRemController.php', {
            method: 'POST',
            body: formularioedit
        })
                .then(resp => resp.json())
                .then(dataedit => {
                    if (dataedit === "PoblacionNula") {
                        alert("Error, La poblacion digitada al editar no existe");
                    }
                    if (dataedit === "ClienteExistente") {
                        alert("Error, El numero de documento digitado al editar ya esta registrado como otro cliente, por favor verifique los datos");
                    }
                    if (dataedit === "ClienteModificado") {
                        alert("Edicion de cliente exitosa");
                    }
                    if (dataedit === "ClienteNoModificado") {
                        alert("Error al editar el cliente remitente, por favor comuniquese con el area tecnica");
                    }
                });
    }
});

