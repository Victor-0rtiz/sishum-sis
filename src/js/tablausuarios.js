(function () {
    
     $('#tablaUsuarios').DataTable({
         language: {
             "lengthMenu": "Mostrar _MENU_ registros por página",
             "zeroRecords": "No se encontraron resultados",
             "info": "Mostrando página _PAGE_ de _PAGES_",
             "infoEmpty": "No hay registros disponibles",
             "infoFiltered": "(filtrado de _MAX_ registros totales)",
             "search": "Buscar:",
             "loadingRecords": "Cargando...",
             "processing": "Procesando...",
             "emptyTable": "No hay datos disponibles en la tabla",
             "aria": {
                 "sortAscending": ": activar para ordenar la columna de manera ascendente",
                 "sortDescending": ": activar para ordenar la columna de manera descendente"
             }
         }
     });


     $.ajax({
        url: "http://localhost:6060/login",
        type: "POST",
        data: formLogin,
        success: function(respuesta) {
          console.log(respuesta);

          if (respuesta.respuesta == true) {
            window.location.href = "http://localhost:6060/dashboard";
          } else if (respuesta.respuesta.error) {
            mostrarAlertasErrorSecuenciales(respuesta.respuesta.error);
          }
        },
        error: function(error) {
          console.log(error);
        }
     })



 
 
 
 })()