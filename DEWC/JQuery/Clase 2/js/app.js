// <script src="https://code.jquery.com/jquery-3.7.1.min.js"> <script> para descargar la lib de jquery
       
//siempre te devuelve el elemnto sobre el que estas trabajando
//$("apuntador"), si hay muchos elementos te lo devuelve en un objeto tipo array
//si es id solo te devuelve 1, el id es unico
 
$("#1").addClass("claseExtra") //removeClass("claseExtra") //hasClass("")
 
$("div").addClass("claseExtra") //si tienes varios elementos, puedes hacer que el addClass/remove a todos defrente, con hasclass te devuelve si uno tiene la clase que buscas
//$("div").css() //si le paso 2 parametros asigno, si paso 1 recupero
$("div").css("border","1px solid black")
$("div").css("border","")
       
$("img").attr("src","https://media.tenor.com/zqSA5TmyIYUAAAAM/sus-cat-2-suspicious-cat.gif") //1 parametro recupero, 2 asigno
//para ingresar a los atributos es attr()
       
$("button").on("click",function(e){
    console.log(e.target)
}) //on sustituye al addEventListener y se puede a plicar a uno o varios elementos
$("#3").one("click",(e)=>{
            console.log("HOLA CAUSAS")
}) //para que la accion ocurra una vez
 
$("input").val("WAAA") //atributo value
 
$("#div").html("<p>dwadwadaw</p>") //sobreescribir todo el html dentro del contenedor si 2 hay variables, o recoger todo el html dentro del contenedor si hay 1 variable
$("#div").append("<p>WAAA</p>") //agregar al final de del html del contenedor
$("#div").prepend("<p>ESTO VA AL PRINCIPOo</p>") //agregar al principio del html del contenedor
$("#div").toggleClass("azul") //si la funcion esta dentro la quita y si no la pone
$("#div").addClass("verde") //agregar clase, removeClass para quitar
$("#div").click((e)=>{ //evento predefinido para el evento addeventlistener("click",f(x)), tambien sirve para simular un click
    console.log("WAA")
})
$("#div").click()
 
//ANIMACIONES SENCILLAS
$("div").on("click",(e)=>{
    $("#div1").show(1000) //tiempo para que se muestre en ms //hide para ocultar //hay mas(muchas)
    //
})