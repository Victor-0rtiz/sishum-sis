(function () {


    $.ajax({
        url: '/api/docentes/all', // Especifica la URL de tu controlador
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response);
            const table = $('#tablaDocentes').DataTable({
                data: response,
                columns: [
                    { data: 'Id' },
                    { data: 'Nombres' },
                    { data: 'Apellidos' },
                    { data: 'Cod_docente' },
                    { data: 'usser' },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return '<button type="button" class="btn btn-primary btn-editar" data-bs-toggle="modal" data-bs-target="#editarModal">Editar</button> <button type="button" class="btn btn-danger">Borrar</button>';
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
            // Por ejemplo, cerrar el modal
            // $('#addModal').modal('hide');
            // // Actualizar la tabla de usuarios u otra interfaz según sea necesario
        },
        error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });




    $.ajax({
        url: "/api/usuarios/tipouser",
        dataType: 'json',
        success: function (result) {
            console.log(result, "del tipo");

            $('#agregarIdTipoUsuario').empty();
            // Agrega una opción por cada dato del tipo de usuario
            result.forEach(function (tipoUsuario) {
                $('#agregarIdTipoUsuario').append('<option value="' + tipoUsuario.Id + '">' + tipoUsuario.Nombre + '</option>');
            });

        },
        error: function (params) {

        }
    });

    $.ajax({
        url: "/api/sexo/all",
        dataType: 'json',
        success: function (result) {
            console.log(result, "del sexo");
            $('#sexo').empty();
            // Agrega una opción por cada dato del tipo de usuario
            result.forEach(function (sexo) {
                $('#sexo').append('<option value="' + sexo.Id + '">' + sexo.Nombre + '</option>');
            });




        },
        error: function (params) {

        }
    });



    $("#formDocente").on('submit', function (event) {
        event.preventDefault();

        const formDatosP = new FormData($("#formAddDatosPersonales")[0]);
        const formDatosDoc = new FormData($("#formDocente")[0]);


        function formDataToObject(formData) {
            let obj = {};
            formData.forEach((value, key) => {
                obj[key] = value;
            });
            return obj;
        }

        const form1 = formDataToObject(formDatosDoc);
        const form2 = formDataToObject(formDatosP);


        // Combinar los objetos de datos en un solo objeto
        const dataForms = {
            docente: form1,
            datos_personales: form2,

        };

        // console.log(dataForms);


        // Enviar la solicitud AJAX
        $.ajax({
            url: '/api/docentes/add', // Especifica la URL de tu controlador
            type: 'POST', // O el método HTTP que estés utilizando
            data: dataForms, // Los datos del formulario serializados
            dataType: 'json', // El tipo de datos esperado en la respuesta
            success: function (response) {
                // Manejar la respuesta del servidor
                console.log(response);

                if (response.error) {
                    Swal.fire({
                        icon: "error",
                        html: `<span style="font-size: 1.5rem; font-weight: 900;">${response.error}</span>`,
                        toast: true,
                        position: 'bottom-end',
                        iconColor: 'red',
                        timer: 1500,
                        padding: "2rem",
                        background: 'rgb(231, 184, 184)',
                        showConfirmButton: false,
                    });

                }

                if (response.act) {

                    $('#agregarModal').modal('hide');
                    Swal.fire({
                        icon: "success",
                        html: `<span style="font-size: 1.5rem; font-weight: 900;">${response.resp}</span>`,
                        toast: true,
                        position: 'bottom-end',
                        iconColor: 'green',
                        timer: 1500,
                        padding: "2rem",
                        background: 'rgb(168,255,162)',
                        showConfirmButton: false,
                    });

                    $.ajax({
                        url: '/api/docentes/all', // Especifica la URL de tu controlador
                        dataType: 'json', // El tipo de datos esperado en la respuesta
                        success: function (response) {
                            // Manejar la respuesta del servidor
                            console.log(response);
                            const table = $('#tablaDocentes').DataTable({
                                destroy: true, 
                                data: response,
                                columns: [
                                    { data: 'Id' },
                                    { data: 'Nombres' },
                                    { data: 'Apellidos' },
                                    { data: 'Cod_docente' },
                                    {
                                        data: null,
                                        render: function (data, type, row) {
                                            return '<button type="button" class="btn btn-primary btn-editar" data-bs-toggle="modal" data-bs-target="#editarModal">Editar</button> <button type="button" class="btn btn-danger">Borrar</button>';
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
                            // Por ejemplo, cerrar el modal
                            // $('#addModal').modal('hide');
                            // // Actualizar la tabla de usuarios u otra interfaz según sea necesario
                        },
                        error: function (xhr, status, error) {
                            // Manejar errores de la solicitud AJAX
                            console.error(xhr.responseText);
                        }
                    });
                }
                // Por ejemplo, cerrar el modal
                $('#addModal').modal('hide');
                // Actualizar la tabla de usuarios u otra interfaz según sea necesario
            },
            error: function (xhr, status, error) {
                // Manejar errores de la solicitud AJAX
                console.error(xhr.responseText);
            }
        });


    })


})()