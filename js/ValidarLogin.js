window.addEventListener('load',() =>{ //esta ´inea es para esperar a que se cargue todo el formulario antes de ejecutar el js

    let formulario = document.getElementById('form-login'); //esta línea guarda en formulario todos los atributos
    let errorLogin = document.getElementById('error-login');
    function data(){
        let datos = new FormData(formulario);//aqui se crea datos como un nuevo objeto de formulario pasandole todo lo que trae el formulario
        //console.log(datos.get("usuariologin"));impresionde datos mostrando que lo anterior funciona
        //console.log(datos.get("clavelogin"));impresionde datos mostrando que lo anterior funciona
        
        fetch('/entregas-am/controlador/LoginController.php',{//primero se pasa la url a donde se envia la informacion y la que devuelve la respuesta en la promesa de json
            method: 'POST',//metodo que se va a usar, por defecto lo hace por get, por eso se debe especificar cuando sea post
            body: datos //Aqui se le dice que en el cuerpo de este envio va la informacion de datos, en este caso es toda la informacion del formulario
        })
                .then( respuesta => respuesta.json())//promesa 1, aqui se le dice que se va a recibir una respuesta TIPO json
                .then( data => {//aqui se recibe en data todo lo que viene del otro aervhivo, debe venir como tipo jcon encode
                 if(data == "Objeto nulo"){
                     console.log("el objeto se valida y es nulo");
                     document.getElementById('error-login').classList.add('error-loginactive');
                 }else{
                     console.log("El objeto trae: " + data);
                     location.href = '/entregas-am/vista/VistaEmpleadoDigitador.php';
                 }
        }); 

    }
    
    formulario.addEventListener('submit',(e) => {
        e.preventDefault();
        data();
    });
});

