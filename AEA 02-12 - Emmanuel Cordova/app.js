$("#agregarCorreo").click(function () {
    const email = $("#tablaEmail tbody tr").length+1;
    const iniciarTabla = `
                            <tr>
                                <td>${email}</td>
                                <td>
                                    <span class="vista">
                                        <i class="fa-solid fa-id-card-clip"></i>
                                        Nombre del correo
                                    </span>
                                    <span class="func" style="display:none;">
                                        <input type="checkbox" class="checkbox">
                                        Nombre del correo
                                        <i class="fa-regular fa-envelope"></i>
                                        <i class="fa-regular fa-flag"></i>
                                        <i class="fa-solid fa-thumbtack"></i>
                                        <i class="fa-solid fa-trash"></i>
                                    </span>
                                    <span>Texto del correo</span>
                                </td>
                            </tr>
                        `;
    $("#tablaEmail tbody").append(iniciarTabla);
});

// Evento para cuando pase el mouse y saque el mouse de la fila
$(document).on("mouseenter","#tablaEmail tbody tr",function(){
    $(this).find(".vista").hide();
    $(this).find(".func").show();
});

$(document).on("mouseleave","#tablaEmail tbody tr",function(){
    $(this).find(".func").hide();
    $(this).find(".vista").show();
});

// Pa cambiar el color de la bandera
$(document).on("click",".fa-flag",function () {
    const color = $(this).css("color");
    $(this).css("color",color === "black" ? "black":"red");
});

$("#borrarEmailMarcado").click(function () {
    $("#tablaEmail tbody tr").each(function () {
        const marcado = $(this).find(".checkbox").is(":checked");
        if (marcado) {
            $(this).remove();
        }
    });
});

$("#borrarEmailMarcado").click(function () {
    $("#tablaEmail tbody tr").each(function () {
        const banderaRoja = $(this).find(".fa-flag").css("color" === "red");
        const marcado = $(this).find(".checkbox").is(":checked");
        if (marcado && !banderaRoja) {
            $(this).remove();
        }
    });
});
