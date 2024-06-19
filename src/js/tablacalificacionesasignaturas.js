(function () {

    const params = new URLSearchParams(window.location.search);

    // Obtiene el valor del parámetro 'grado'
    const iddag = params.get('idDetalle');
    const turno = params.get('turno');

    // Imprime el valor en la consola
    console.log('iddag:', iddag);

    $.ajax({
        url: '/api/calificaciones/asignaturas/all', // Especifica la URL de tu controlador
        type: 'POST',
        data: { "iddag": iddag },
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
                             <button type="button" class="btn btn-primary btn-editar" data-bs-toggle="modal" data-bs-target="#editarModal" data-id="${row.id}">Editar</button>
                            <a href="/dashboard/calificaciones-notas?grado=${row.id_grado}&dga=${row.Id}&asignatura=${row.Id_asignatura}" class="btn btn-secondary btn-editar">
                            Ver Notas 
                             </a> 

                            <button type="button" class="btn btn-danger btn-borrar" data-id="${row.Id}">Borrar</button>
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

    $.ajax({
        url: '/api/asignaturas/list', // Especifica la URL de tu controlador
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response, "del listado de asignaturas");


            response.forEach(function (asignatura) {
                $('#asignatura').append('<option value="' + asignatura.Id + '">' + asignatura.Nombre + '</option>');
            });


        },
        error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });

    $.ajax({
        url: '/api/docentes/all', // Especifica la URL de tu controlador
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response, 'del docentes');

            response.forEach(function (docente) {
                $('#docente').append('<option value="' + docente.Id + '">' + docente.Nombres + ' ' + docente.Apellidos + '</option>');
            });

            // Por ejemplo, cerrar el modal
            // $('#addModal').modal('hide');
            // // Actualizar la tabla de usuarios u otra interfaz según sea necesario
        },
        error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });


    $('#tablaCaliAsign').on('click', '.btn-borrar', function () {
        const id = $(this).data('id');
        // Aquí puedes generar el reporte
        console.log('eliminar el registro ID:', id);

        // Aquí puedes realizar la acción de borrado
        $.ajax({
            url: '/api/calificaciones/asignaturas/del', // URL de tu controlador que genera el PDF
            type: 'POST',
            data: { "Id": id }, // Enviar los datos como JSON
            dataType: "json",
            success: async function (response) {
                console.log(response);
                const respuesta = response;

                if (respuesta.exito) {
                    await cargarLista();

                    await Swal.fire({
                        icon: "success",
                        html: `<span style="font-size: 1.5rem; font-weight: 900;">Eliminado Correctamente</span>`,
                        toast: true,
                        position: 'bottom-end',
                        iconColor: 'green',
                        timer: 1500,
                        padding: "2rem",
                        background: '#B8FFB8',
                        showConfirmButton: false,
                    });

                    return;

                }
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
    });



    $(document).ready(async () => {

        $("#GuardarAsigDocAnio").click(async () => {

            let formDataAsignaturaDocente = new FormData($("#FormAsigAsignaturaDoc")[0]);

            formDataAsignaturaDocente = formDataToObject(formDataAsignaturaDocente);
            formDataAsignaturaDocente.Id_detalle_aniolectivo_grado = iddag;

            console.log(formDataAsignaturaDocente);

            $.ajax({
                url: '/api/calificaciones/asignaturas/add', // Especifica la URL de tu controlador
                type: 'POST', // O el método HTTP que estés utilizando
                data: formDataAsignaturaDocente, // Los datos del formulario serializados
                dataType: 'json', // El tipo de datos esperado en la respuesta
                success: async function (response) {
                    // Manejar la respuesta del servidor
                    console.log(response, 'de agregar');


                    if (response.exito) {
                        await cargarLista()
                        $('#asignarAsignatura').modal('hide');
                        await Swal.fire({
                            icon: "success",
                            html: `<span style="font-size: 1.5rem; font-weight: 900;">${response.exito}</span>`,
                            toast: true,
                            position: 'bottom-end',
                            iconColor: 'green',
                            timer: 1500,
                            padding: "2rem",
                            background: '#B8FFB8',
                            showConfirmButton: false,
                        });

                        return;

                    }

                    if (response.error) {
                        await Swal.fire({
                            icon: "error",
                            html: `<span style="font-size: 1.5rem; font-weight: 900;">${response.error}</span>`,
                            toast: true,
                            position: 'bottom-end',
                            iconColor: 'red',
                            timer: 1500,
                            padding: "2rem",
                            background: '#FFB8B8',
                            showConfirmButton: false,
                        });
                        return;

                    }
                    if (response.alert) {
                        await Swal.fire({
                            icon: "warning",
                            html: `<span style="font-size: 1.5rem; font-weight: 900;">${response.alert}</span>`,
                            toast: true,
                            position: 'bottom-end',
                            iconColor: 'yellow',
                            timer: 1500,
                            padding: "2rem",
                            background: '#F6FBC2',
                            showConfirmButton: false,
                        });
                        return;

                    }


                    // Actualizar la tabla de usuarios u otra interfaz según sea necesario
                },
                error: function (xhr, status, error) {
                    // Manejar errores de la solicitud AJAX
                    console.error(xhr.responseText);
                }
            });
        })

    });

    function formDataToObject(formData) {
        let obj = {};
        formData.forEach((value, key) => {
            obj[key] = value;
        });
        return obj;
    }


    async function cargarLista() {
        $.ajax({
            url: '/api/calificaciones/asignaturas/all', // Especifica la URL de tu controlador
            type: 'POST',
            data: { "iddag": iddag },
            dataType: 'json', // El tipo de datos esperado en la respuesta
            success: function (response) {
                // Manejar la respuesta del servidor
                console.log(response);
                const table = $('#tablaCaliAsign').DataTable({
                    destroy: true,
                    data: response,
                    columns: [
                        { data: 'Id' },
                        { data: 'Asignatura_nombre' },
                        { data: 'Nombres' },
                        {
                            data: null,
                            render: function (data, type, row) {
                                return `
                                <button type="button" class="btn btn-primary btn-editar" data-bs-toggle="modal" data-bs-target="#editarModal" data-id="${row.id}">Editar</button>
                               <a href="/dashboard/calificaciones-notas?grado=${row.id_grado}&dga=${row.Id}&asignatura=${row.Id_asignatura}" class="btn btn-secondary btn-editar">
                               Ver Notas 
                                </a> 
   
                               <button type="button" class="btn btn-danger btn-borrar" data-id="${row.Id}">Borrar</button>
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

    }




})()