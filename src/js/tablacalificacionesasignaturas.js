(function () {

    const params = new URLSearchParams(window.location.search);

    // Obtiene el valor del parámetro 'grado'
    const grado = params.get('grado');
    const turno = params.get('turno');
  
    // Imprime el valor en la consola
    console.log('Grado:', grado, "  turno", turno);
 
    $.ajax({
        url: '/api/calificaciones/asignaturas/all', // Especifica la URL de tu controlador
        type: 'POST',
        data:{ "grado": grado, "turno": turno},
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response);
            const table = $('#tablaCaliAsign').DataTable({

                data: response,
                columns: [
                    { data: 'Id' },
                    { data: 'Asignatura_nombre' },
                    { data: 'Nombres' },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                            <a href="/dashboard/calificaciones-notas?asignatura=${row.Id}" class="btn btn-primary btn-editar">
                            Ver Asignaturas ${row.Id}
                             </a> 
                            <button type="button" class="btn btn-danger">Borrar</button>
                                        `;
                        }
                    }
                ],
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


        },
        error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });



})()