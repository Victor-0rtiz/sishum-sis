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
    $.ajax({
        url: '/api/asignaturas/list', // Especifica la URL de tu controlador
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response, "del listado de asignaturas");
            const table = $('#tablaAsignaturasList').DataTable({
                data: response,
                columns: [
                    { data: 'Id' },
                    { data: 'Nombre' },

                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                            <a href="" class="btn btn-primary btn-editar">
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

            response.forEach(function (asignatura) {
                $('#Asignatura').append('<option value="' + asignatura.Id + '">' + asignatura.Nombre + '</option>');
            });


        },
        error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });


    $(document).ready(() => {
        $("#formAsignatura").on('submit', function (event) {
            event.preventDefault();
            const formAsignatura = new FormData($("#formAsignatura")[0]);

            function formDataToObject(formData) {
                let obj = {};
                formData.forEach((value, key) => {
                    obj[key] = value;
                });
                return obj;
            }

            const form1 = formDataToObject(formAsignatura);

            if (Object.values(form1) == "") {
                Swal.fire({
                    icon: "error",
                    html: `<span style="font-size: 1.5rem; font-weight: 900;">El nombre no puede ir vacio</span>`,
                    toast: true,
                    position: 'bottom-end',
                    iconColor: 'red',
                    timer: 1500,
                    padding: "2rem",
                    background: 'rgb(231, 184, 184)',
                    showConfirmButton: false,
                });
                return;
            }

            console.log(formAsignatura);

            $.ajax({
                url: '/api/asignaturas/add', // Especifica la URL de tu controlador
                type: 'POST', // O el método HTTP que estés utilizando
                data: form1, // Los datos del formulario serializados
                dataType: 'json', // El tipo de datos esperado en la respuesta
                success: async function (response) {
                    // Manejar la respuesta del servidor
                    console.log(response, 'de agregar');
                    if (response.exito) {
                        await cargarLista()
                        $('#agregarAsignaturaModal').modal('hide');
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


                    // Actualizar la tabla de usuarios u otra interfaz según sea necesario
                },
                error: function (xhr, status, error) {
                    // Manejar errores de la solicitud AJAX
                    console.error(xhr.responseText);
                }
            });


        });

        $("#formAsigAnioLec").on('submit', function (event) {
            event.preventDefault();



            const formAsinaturasAnio = new FormData($("#formAsigAnioLec")[0]);

            function formDataToObject(formData) {
                let obj = {};
                formData.forEach((value, key) => {
                    obj[key] = value;
                });
                return obj;
            }

            const form1 = formDataToObject(formAsinaturasAnio);


            console.log(form1);


            $.ajax({
                url: '/api/asignaturas-asignadas/add', // Especifica la URL de tu controlador
                type: 'POST', // O el método HTTP que estés utilizando
                data: form1, // Los datos del formulario serializados
                dataType: 'json', // El tipo de datos esperado en la respuesta
                success: async function (response) {
                    // Manejar la respuesta del servidor
                    console.log(response, 'de agregar asignatura asignada');
                    if (response.exito) {
                        await cargarLista2()
                        $('#agregarAsignaturaGradoModal').modal('hide');
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


                    // Actualizar la tabla de usuarios u otra interfaz según sea necesario
                },
                error: function (xhr, status, error) {
                    // Manejar errores de la solicitud AJAX
                    console.error(xhr.responseText);
                }
            });




        });

    })



    async function cargarLista() {

        $.ajax({
            url: '/api/asignaturas/list', // Especifica la URL de tu controlador
            dataType: 'json', // El tipo de datos esperado en la respuesta
            success: function (response) {
                // Manejar la respuesta del servidor
                console.log(response, "del listado de asignaturas");
                const table = $('#tablaAsignaturasList').DataTable({
                    destroy: true,
                    data: response,
                    columns: [
                        { data: 'Id' },
                        { data: 'Nombre' },
                        {
                            data: null,
                            render: function (data, type, row) {
                                return `
                                <a href="" class="btn btn-primary btn-editar">
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

                response.forEach(function (asignatura) {
                    $('#Asignatura').append('<option value="' + asignatura.Id + '">' + asignatura.Nombre + '</option>');
                });


            },
            error: function (xhr, status, error) {
                // Manejar errores de la solicitud AJAX
                console.error(xhr.responseText);
            }
        });



    }
    async function cargarLista2() {




        $.ajax({
            url: '/api/asignaturas/all', // Especifica la URL de tu controlador
            dataType: 'json', // El tipo de datos esperado en la respuesta
            success: function (response) {
                // Manejar la respuesta del servidor
                console.log(response);
                const table = $('#tablaAsignaturas').DataTable({
                    destroy: true,
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
    }





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
    $.ajax({
        url: '/api/docentes/all', // Especifica la URL de tu controlador
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response, "del listado del docente");
            response.forEach(function (docente) {
                $('#Docente').append('<option value="' + docente.Id + '">' + docente.Nombres + ' ' + docente.Apellidos + '</option>');
            });
        },
        error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });




})()