(function () {

    $.ajax({
        url: '/api/grado/calificacion/all', // Especifica la URL de tu controlador
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response);
            const table = $('#tablaasingas').DataTable({
                data: response,
                columns: [
                    { data: 'Id' },
                    { data: 'Id_grado_nombre' },
                    { data: 'Id_turno_nombre' },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                                <button type="button" class="btn btn-primary btn-editar" data-bs-toggle="modal" data-bs-target="#editarModal" data-id="${row.id}">Editar</button>
                                <a href="/dashboard/calificaciones-asignaturas?grado=${row.Id_grado}&turno=${row.Id_turno}&idDetalle=${row.Id }" class="btn btn-secondary btn-verasignaturas">
                           Asignaturas 
                             </a> 
                                <button type="button" class="btn btn-danger btn-borrar" data-id="${row.Id}">Borrar</button>
                            `  ;
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


    $('#tablaasingas').on('click', '.btn-borrar', function () {
        const id = $(this).data('id');
        // Aquí puedes generar el reporte
        console.log('eliminar el registro ID:', id);

        // Aquí puedes realizar la acción de borrado
        $.ajax({
            url: '/api/grado/calificacion/del', // URL de tu controlador que genera el PDF
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





    $.ajax({
        url: '/api/grados/all', // Especifica la URL de tu controlador
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response, "del listado del grado");
            response.forEach(function (grado) {
                $('#Grado').append('<option value="' + grado.Id + '">' + grado.Nombre + '</option>');
            });
        },
        error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });
    $.ajax({
        url: '/api/turnos/all', // Especifica la URL de tu controlador
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response, "del listado del turno");
            response.forEach(function (Turnos) {
                $('#Turno').append('<option value="' + Turnos.Id + '">' + Turnos.Nombre + '</option>');
            });
        },
        error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });
    $.ajax({
        url: '/api/anioslectivos/all', // Especifica la URL de tu controlador
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response, "del listado del anio lectivo");
            response.forEach(function (anioLec) {
                $('#AnioLectivo').append('<option value="' + anioLec.Id + '">' + anioLec.anio + '</option>');
            });
        },
        error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });



    $(document).ready(() => {

        $("#GuardarAnioGradoTurno").click(async () => {

            let formDataAnioGradoTurno = new FormData($("#FormAnioGradoTurno")[0]);

            formDataAnioGradoTurno = formDataToObject(formDataAnioGradoTurno);
            console.log(formDataAnioGradoTurno);

            $.ajax({
                url: '/api/grado/calificacion/add', // Especifica la URL de tu controlador
                type: 'POST', // O el método HTTP que estés utilizando
                data: formDataAnioGradoTurno, // Los datos del formulario serializados
                dataType: 'json', // El tipo de datos esperado en la respuesta
                success: async function (response) {
                    // Manejar la respuesta del servidor
                    console.log(response, 'de agregar');


                    if (response.exito) {
                        await cargarLista()
                        $('#asignarTurnoGrado').modal('hide');
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
            url: '/api/grado/calificacion/all', // Especifica la URL de tu controlador
            dataType: 'json', // El tipo de datos esperado en la respuesta
            success: function (response) {
                // Manejar la respuesta del servidor
                console.log(response);
                const table = $('#tablaasingas').DataTable({
                    destroy: true,
                    data: response,
                    columns: [
                        { data: 'Id' },
                        { data: 'Id_grado_nombre' },
                        { data: 'Id_turno_nombre' },
                        {
                            data: null,
                            render: function (data, type, row) {
                                return `
                                <button type="button" class="btn btn-primary btn-editar" data-bs-toggle="modal" data-bs-target="#editarModal" data-id="${row.id}">Editar</button>
                                <a href="/dashboard/calificaciones-asignaturas?grado=${row.Id_grado}&turno=${row.Id_turno}&idDetalle=${row.Id}" class="btn btn-secondary btn-verasignaturas">
                             Asignaturas 
                             </a> 
                                <button type="button" class="btn btn-danger btn-borrar" data-id="${row.Id}">Borrar</button>
                            `  ;
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