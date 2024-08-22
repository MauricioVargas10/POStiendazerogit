function MNuevoCliente() {
  $("#modal-default").modal("show");

  var obj = "";
  $.ajax({
    type: "POST",
    url: "vista/cliente/FNuevoCliente.php",
    data: obj,
    success: function (data) {
      $("#content-default").html(data);
    }
  });
}

function regCliente() {
  $.ajax({
    url: "controlador/clienteControlador.php?ctrRegCliente", // Cambia esto por la URL donde está el controlador PHP que maneja el registro de clientes
    type: 'POST',
    data: $('#FRegCliente').serialize(), // Serializa los datos del formulario
    success: function (response) {
      // Procesa la respuesta del servidor aquí
      if (response === "ok") {
        alert("Cliente registrado exitosamente");
        $('#FRegCliente')[0].reset(); // Limpia el formulario
        // Opcional: Cierra el modal si lo estás usando
        $("#modal-default").modal("show"); // Cambia '#modalID' por el ID de tu modal
        // Opcional: Actualiza la vista si es necesario
        // location.reload(); // Recarga la página
      } else {
        alert("Error al registrar el cliente: " + response);
      }
    },
    error: function () {
      alert("Hubo un error al procesar la solicitud");
    }
  });
}


function MEditCliente(id) {
  $("#modal-default").modal("show");

  $.ajax({
    type: "POST",
    url: "vista/cliente/FEditCliente.php?id=" + id,
    success: function(data) {
      $("#content-default").html(data);
    }
  });
}

function editCliente() {
  var formData = new FormData($("#FEditCliente")[0]);

  $.ajax({
    type: "POST",
    url: "controlador/clienteControlador.php?ctrEditCliente",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function(data) {
      if (data === "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Cliente ha sido actualizado',
          timer: 1000
        });
        setTimeout(function() {
          location.reload();
        }, 1200);
      } else {
        Swal.fire({
          title: "Error!",
          icon: "error",
          showConfirmButton: false,
          timer: 1000
        });
      }
    }
  });
}

function MEliCliente(id) {
  var obj = { id: id };

  Swal.fire({
    title: "¿Estás seguro de eliminar este cliente?",
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controlador/clienteControlador.php?ctrEliCliente",
        data: obj,
        success: function(data) {
          if (data === "ok") {
            location.reload();
          } else {
            Swal.fire({
              icon: 'error',
              showConfirmButton: false,
              title: 'Error',
              text: 'El cliente no puede ser eliminado',
              timer: 1000
            });
          }
        }
      });
    }
  });
}
