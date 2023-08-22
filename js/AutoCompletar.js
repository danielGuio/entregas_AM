window.addEventListener('load', () => {


    function autcocompletar() {
        const inputpoblacion = document.querySelector('#ubicasionclirem');
        let indexFocus = -1;

        inputpoblacion.addEventListener('input', function () {
            const tipopoblacion = this.value;
            if (!tipopoblacion)
                return false;
            cerrarLista();
            let formulario = document.getElementById('form-crear-cliRem');
            let datos = new FormData(formulario);
            datos.append('buscarListapoblacion', true);
            datos.append('entrada', tipopoblacion);
            fetch('/entregas-am/controlador/ControllerUbicacion.php', {
                method: 'POST',
                body: datos
            })
                    .then(result => result.json())
                    .then(data => {
                        //crear la lista de sugerencias
                        const divList = document.createElement('div');
                        divList.setAttribute('id', this.id + '-lista-autocompletar');
                        divList.setAttribute('class', 'lista-autocompletar-item');
                        this.parentNode.appendChild(divList);
                        //validar arreglo vs input
                        if (data.length == 0){
                            alert("No se encuentra registrada la ubicasion digitada");
                            return false;
                        }else{                          
                        data.forEach(item => {

                            if (item.substr(0, tipopoblacion.length).toLowerCase() == tipopoblacion.toLowerCase()) {
                                const elementoLista = document.createElement('div');
                                elementoLista.innerHTML = `<strong>${item.substr(0, tipopoblacion.length)}</strong>${item.substr(tipopoblacion.length)}`;
                                elementoLista.addEventListener('click', function () {
                                    inputpoblacion.value = this.innerText;
                                    cerrarLista();
                                    return false;
                                });
                                divList.appendChild(elementoLista);
                            }
                        });
                        
            }
                    });

        });

        inputpoblacion.addEventListener('keydown', function (e) {
            const divList = document.querySelector('#' + this.id + '-lista-autocompletar');
            let items;
            if (divList) {
                items = divList.querySelectorAll('div');

                switch (e.keyCode) {
                    case 40://tecla abajo
                        indexFocus++;
                        if (indexFocus > items.length - 1) {
                            indexFocus = items.length - 1;
                        }
                        break;

                    case 38://tecla arriba
                        indexFocus--;
                        if (indexFocus < 0) {
                            indexFocus = 0;

                        }
                        break

                    case 13://tecla enter
                        e.preventDefault();
                        if(indexFocus === -1){indexFocus=0;};
                        items[indexFocus].click();
                        indexFocus = -1;
                        break;

                    case 8://tecla delete
                        var tipopob = document.getElementById('ubicasionclirem').value.length;
                        if (tipopob === 1) {
                            cerrarLista();
                        }
                        break;

                    default:
                        break
                }
                seleccionar(items, indexFocus);
                return false;
            }
        });

        document.addEventListener('click', function () {
            cerrarLista();
        });
    }

    function seleccionar(items, indexFocus) {
        if (!items || indexFocus == -1)
            return false;
        items.forEach(x => {
            x.classList.remove('autocompletar-active');
        });
        items[indexFocus].classList.add('autocompletar-active');
    }



    function cerrarLista() {
        const items = document.querySelectorAll('.lista-autocompletar-item');
        items.forEach(item => {
            item.parentNode.removeChild(item);
        });
        indexFocus = -1;
    }

    autcocompletar();

});


