window.onload = function(){
    let divclienteRem = document.getElementById("div_gets_cli_rem");
    let divPoblacion = document.getElementById("div_gets_pobl");
    let divGuia = document.getElementById("div_gets_guia");
    let divEmpleado = document.getElementById("div_gest_empleados");
    let divClienteDest = document.getElementById("div_gets_cli_dest");
    let divRuta = document.getElementById("div_gest_ruta");

    divclienteRem.addEventListener('click',()=>{
        clienteremi();
    });
    
    divPoblacion.addEventListener('click',()=>{
       gestpoblacion();
    });
    
    divGuia.addEventListener('click', ()=>{
        gestguia();
    });
    
    divEmpleado.addEventListener('click', ()=>{
        gestEmpleado();
    });
    
    divClienteDest.addEventListener('click', ()=>{
        gestClieDest();
    }); 
    
    divRuta.addEventListener('click', ()=>{
        gestRuta();
    }); 
};
    
    function clienteremi(){
    var claslistclirem = document.getElementById('list-clienteremi').classList.value;
    let imgCliRem = document.getElementById('img-cli-rem');
    
    if (claslistclirem === "list-cont-opciones"){
        document.getElementById('list-clienteremi').classList.add('list-cont-opciones_activo');
        document.getElementById('list-clienteremi').classList.remove('list-cont-opciones');
        imgCliRem.setAttribute("style", "display: none");
    }else{
        document.getElementById('list-clienteremi').classList.add('list-cont-opciones');
        document.getElementById('list-clienteremi').classList.remove('list-cont-opciones_activo');
        imgCliRem.setAttribute("style", "display: block");
    }   
}


function gestpoblacion(){
    var claslistpobla = document.getElementById('list-pobla').classList.value;
    let imgPoblaMapa = document.getElementById('img-poblacion-mapa');
    
    if (claslistpobla === "list-cont-opciones"){
        document.getElementById('list-pobla').classList.add('list-cont-opciones_activo');
        document.getElementById('list-pobla').classList.remove('list-cont-opciones');
        imgPoblaMapa.setAttribute("style", "display: none");
    }else{
        document.getElementById('list-pobla').classList.add('list-cont-opciones');
        document.getElementById('list-pobla').classList.remove('list-cont-opciones_activo');
        imgPoblaMapa.setAttribute("style", "display: block");
    }   
}

function gestguia(){
    var claslistguia = document.getElementById('list-guia').classList.value;
    let imgguia = document.getElementById('img-guia');
    
    if (claslistguia === "list-cont-opciones"){
        document.getElementById('list-guia').classList.add('list-cont-opciones_activo');
        document.getElementById('list-guia').classList.remove('list-cont-opciones');
        imgguia.setAttribute("style", "display: none");
    }else{
        document.getElementById('list-guia').classList.add('list-cont-opciones');
        document.getElementById('list-guia').classList.remove('list-cont-opciones_activo');
        imgguia.setAttribute("style", "display: block");
    }   
}

function gestEmpleado(){
    var claslistguia = document.getElementById('list-empleado').classList.value;
    let imgempleado = document.getElementById('img-empleado');
    
    if (claslistguia === "list-cont-opciones"){
        document.getElementById('list-empleado').classList.add('list-cont-opciones_activo');
        document.getElementById('list-empleado').classList.remove('list-cont-opciones');
        imgempleado.setAttribute("style", "display: none");
    }else{
        document.getElementById('list-empleado').classList.add('list-cont-opciones');
        document.getElementById('list-empleado').classList.remove('list-cont-opciones_activo');
        imgempleado.setAttribute("style", "display: block");
    }   
}
function gestClieDest(){
    var claslistclidest = document.getElementById('list-cliente_dest').classList.value;
    let imgclidest = document.getElementById('img-cli-dest');
    
    if (claslistclidest === "list-cont-opciones"){
        document.getElementById('list-cliente_dest').classList.add('list-cont-opciones_activo');
        document.getElementById('list-cliente_dest').classList.remove('list-cont-opciones');
        imgclidest.setAttribute("style", "display: none");
    }else{
        document.getElementById('list-cliente_dest').classList.add('list-cont-opciones');
        document.getElementById('list-cliente_dest').classList.remove('list-cont-opciones_activo');
        imgclidest.setAttribute("style", "display: block");
    }   
}

function gestRuta(){
    var claslistruta = document.getElementById('list-ruta').classList.value;
    let imgruta = document.getElementById('img-ruta');
    
    if (claslistruta === "list-cont-opciones"){
        document.getElementById('list-ruta').classList.add('list-cont-opciones_activo');
        document.getElementById('list-ruta').classList.remove('list-cont-opciones');
        imgruta.setAttribute("style", "display: none");
    }else{
        document.getElementById('list-ruta').classList.add('list-cont-opciones');
        document.getElementById('list-ruta').classList.remove('list-cont-opciones_activo');
        imgruta.setAttribute("style", "display: block");
    }   
}


