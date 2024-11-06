function decirHola(){
    console.log("hola")
}
/*
    $("#hola").addClass("claseExtra")
    ce.fn.init {0: div#hola.claseExtra, length: 1}
    $("#hola").addClass("claseExtra")
    ce.fn.init {0: div#hola.claseExtra, length: 1}
    $("#hola").removeClass("claseExtra")
    ce.fn.init {0: div#hola, length: 1}
    $("#hola").removeClass("claseExtra")
    ce.fn.init {0: div#hola, length: 1}
    $("#hola").addClass("claseExtra")
    ce.fn.init {0: div#hola.claseExtra, length: 1}
    $("#hola").addClass("claseExtra1")
    ce.fn.init {0: div#hola.claseExtra.claseExtra1, length: 1}
    $("#hola").removeClass("claseExtra").addClass("hola")
    ce.fn.init {0: div#hola.claseExtra1.hola, length: 1}
    $("#hola").hasClass("clas")
    false
    $("#hola").hasClass("claseExtra")
    false
    $("#hola").hasClass("hola")
    true
    $("div").addClass("claseExtra")
    ce.fn.init {0: div#hola.claseExtra1.hola.claseExtra, 1: div.hola2.claseExtra, 2: div.hola1.hola2.hola3.claseExtra, 3: div.hola1.hola2.hola3.claseExtra, 4: div.hola1.hola2.claseExtra, length: 5, prevObject: ce.fn.init}
    $("div").removeClass("claseExtra")
    ce.fn.init {0: div#hola.claseExtra1.hola, 1: div.hola2, 2: div.hola1.hola2.hola3, 3: div.hola1.hola2.hola3, 4: div.hola1.hola2, length: 5, prevObject: ce.fn.init}
    $("div").hasClass("claseExtra")
    false
    $("div").addClass("claseExtra")
    ce.fn.init {0: div#hola.claseExtra1.hola.claseExtra, 1: div.hola2.claseExtra, 2: div.hola1.hola2.hola3.claseExtra, 3: div.hola1.hola2.hola3.claseExtra, 4: div.hola1.hola2.claseExtra, length: 5, prevObject: ce.fn.init}0: div#hola.claseExtra1.hola.claseExtra1: div.hola2.claseExtra2: div.hola1.hola2.hola3.claseExtra3: div.hola1.hola2.hola3.claseExtra4: div.hola1.hola2.claseExtralength: 5prevObject: ce.fn.init {0: document, length: 1}[[Prototype]]: Object
    $("div").hasClass("claseExtra")
    true
    CUIDADO CON ESTE POR QUE CONQUE UNO LO  TENGA SALE TRUE 
    $("div").hasClass("hola1")
    true
    CSS
    $("div").css("border","1px solid red")
    Ver las espeficicaciones del borde
    $("div").css("border")
    Ver imagenes 
    $("img").attr("src")
    CAMBIO DE IMAGEN
    $("img").attr("src","https://i.pinimg.com/originals/78/f8/91/78f8912b7a2c5baa7c3cd5dec13f31a3.jpg")
    SOLO UNA VEZ
    $("#btn1").one("click",decirHola)
*/