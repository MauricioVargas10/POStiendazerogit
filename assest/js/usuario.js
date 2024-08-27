function MNuevoUsuario(){
    $("#modal-warning").modal("show");

    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/usuario/FNuevoUsuario.php",
        data:obj,
        success:function(data){
        $("#content-warning").html(data)
        }
    })
}

function regUsuario() {
    var formData=new FormData($("#FRegUsuario")[0])

    if(formData.get("password")==formData.get("vrPassword")){
        $.ajax({
            type:"POST",
            url:"controlador/usuarioControlador.php?ctrRegUsuario",
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function(data){

                 console.log(data)
                
                if(data="ok"){
                    Swal.fire({
                        icon:"success",
                        showConfirmButton:false,
                        title:"El usuario a sido registrado",
                        timer:1000
                    })
                    setTimeout(function() {
                        location.reload()
                    },1200)
                }else{
                    Swal.fire({
                        title:"ERROR!",
                        icon:"error",
                        showConfirmButton:false,
                        timer:1000
                    })
                }

            }
        })
    }    else{
        Swal.fire({
            title:"Las contraseñas no son iguales",
            icon:"error",
            showConfirmButton:false,
            timer:1000
        })
    }
}

function MEditUsuario(id) {
    $("#modal-warning").modal("show");

    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/usuario/FEditUsuario.php?id="+id,
        data:obj,
        success:function(data){
            $("#content-warning").html(data)
        }
    })
}

function editUsuario() {
    var formData=new FormData($("#FEditUsuario")[0])

    if(formData.get("password")==formData.get("vrPassword")){
        $.ajax({
            type:"POST",
            url:"controlador/usuarioControlador.php?ctrEditUsuario",
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function(data){

                console.log(data)
                
                if(data="ok"){
                    Swal.fire({
                        icon:"success",
                        showConfirmButton:false,
                        title:"Se cambio con exito",
                        timer:1000
                    })
                    setTimeout(function() {
                        location.reload()
                    },1200)
                }else{
                    Swal.fire({
                        title:"ERROR!",
                        icon:"error",
                        showConfirmButton:false,
                        timer:1000
                    })
                }

            }
        })
    }
    else{
        Swal.fire({
            title:"Las contraseñas no son iguales",
            icon:"error",
            showConfirmButton:false,
            timer:1000
        })
    }
}

function MEliUsuario(id) {
    var obj={
        id:id
    }
    Swal.fire({
        title:"Esta seguro de eliminar este usuario",
        showDenyButton:true,
        showCancelButton:false,
        confirmButtonText:'Confirmar',
        denyButtonText:'Cancelar'
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    type:"POST",
                    url:"controlador/usuarioControlador.php?ctrEliUsuario",
                    data:obj,
                    success:function(data){
                        if (data=="ok") {
                            location.reload()
                        }
                        else{
                            Swal.fire({
                                title:"ERROR!",
                                icon:"error",
                                Text:"El usuario no puso ser eliminado",
                                showConfirmButton:false,
                                timer:10000
                            })
                        }
                    }
                })
            }
        })
}