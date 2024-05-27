(function () {
   
    $.ajax({
        url: '/api/asignaturas/all', // Especifica la URL de tu controlador
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response);
            const table = $('#tablaAsignaturas').DataTable({
                data: response,
                columns: [
                    { data: 'Id' },
                    { data: 'Asignatura_Nombre' },
                    { data: 'Docente_Nombres' },
                    { data: 'Grado_Nombre' },
                    { data: 'Turno_Nombre' },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                            <a href="/dashboard/calificaciones-asignaturas?grado=${row.id_grado}&turno=${row.id_turno}" class="btn btn-primary btn-editar">
                            Editar ${row.Id}
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