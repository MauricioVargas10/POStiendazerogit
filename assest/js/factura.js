var host = "http://localhost:5000/";

function verificarComunicacion() {
    var obj = "";

    $.ajax({
        type: "POST",
        url: host + "api/CompraVenta/comunicacion",
        data: obj,
        cache: false,
        contentType: "application/json",
        processData: false,
        success: function(data) {
            if (data["transaccion"]==true) {
                document.getElementById("comunicacionSiat").innerHTML="Conectado"
                document.getElementById("comunicacionSiat").className="badge badge-success"
            }
            // console.log(data);
        }
    }).fail(function (jqXHR, textStatus, errorThrown){
        if (jqXHR.status==0) {
            document.getElementById("comunicacionSiat").innerHTML="Error al conectar"
            document.getElementById("comunicacionSiat").className="badge badge-danger"
        }
})
}

setInterval(verificarComunicacion,1000)