window.addEventListener('load', () => {
    var rdbtnBuscdoc = document.getElementById('RadioBuscDoc');
    var rdbtnBuscnom = document.getElementById('RadioBuscNom');
    var rdbtnBuscTodos = document.getElementById('RadioBuscTodos');
    var fielsetnom = document.getElementById('fielset-nom');
    var fielsetdocu = document.getElementById('fielset-docu');
    var btnbuscar = document.getElementById('BuscarEmpleado');


    rdbtnBuscdoc.addEventListener('click', () => {
        if (rdbtnBuscdoc.checked) {
            fielsetdocu.setAttribute('style', 'display: block');
            fielsetnom.setAttribute('style', 'display: none');
            btnbuscar.setAttribute('style', 'display: block');
        }
    });

    rdbtnBuscnom.addEventListener('click', () => {
        if (rdbtnBuscnom.checked) {
            fielsetnom.setAttribute('style', 'display: block');
            fielsetdocu.setAttribute('style', 'display: none');
            btnbuscar.setAttribute('style', 'display: block');
        }
    });

    rdbtnBuscTodos.addEventListener('click', () => {
        if (rdbtnBuscTodos.checked) {
            fielsetnom.setAttribute('style', 'display: none');
            fielsetdocu.setAttribute('style', 'display: none');
            btnbuscar.setAttribute('style', 'display: block');
        }
    });
    
    

});